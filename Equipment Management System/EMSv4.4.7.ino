String code_version = "EMSv4.4.7_SIM800L_Soft_HeartBeat";

char* DEVICE_ID = "1896052791";

/***
* 
* EMSv4.4.7_SIM800L_Soft_HeartBeat: After x minutes of compressor being switched-off, 
* device will send data every y minutes and then switch-off the GSM module.
* 
* Sim800L soft reset added, no powercut or hard reset required.
* 
* Change Device ID.
* Set Time Interval.
* Select Temperature Sensor DHT22 / DS18B20.
* 
* Features:
* 1. Voltage sensor is read from analog read.
* 2. Latest Temp&Hum Value will be sent.
* 3. Compatible for both DS18B20 and DHT22.
* 4. Compressor OFF interval, data sending interval, compressorOffDataSending interval is adjustable.
* 5. DHT22 Library issue resolved for negative temperature with DHTnew lib.
* 6. Split compressor code into functions.
* 7. Bug fixed in No Compressor code section 
* 8. Filtered temp/hum values (-999 issue). Values out of range will generate 404.00.
* 9. Device Id and device typed in API can be changed through variables.
* 10. Done device Id setup into API.
* 
* Limitations:
* 1. Both Temperature & Humidity sometimes become -999!
* 
* PIN CONFIGURATIONS:
* DEFAULT_LED 13
* ignitionPin 7
* compressorPin A1
* dhtDataPin 5
* ONE_WIRE_BUS 5
* gsmSerial(Rx=7,Tx=6)
* GSM_PIN 8 (Not using)
* 
***/

#define DEBUG
#define ENABLE_NETWORK

// Sensors (Any one of the below)
#define DS18B20
//#define myDHT
//#define dhtnewLib         // this is new library which can detect -ve temperature.
//#define dhtLib          // this library cannot detect -ve temperature.

#define NaN 0xFFFFFFFF

#define DEFAULT_LED 13

// VOLTAGE SENSORS
//#define ignitionSensor       // comment/uncomment to enable or disable ignition sensing.
#define compressorSensor  // comment/uncomment to enable or disable compressor sensing.

// IGNITION
#ifdef ignitionSensor
uint8_t ignitionState = 0;
//#define ignitionPin 7
#endif

// COMPRESSOR
uint8_t compressorAdded = 1;  // if 1-compressor sensor added, if 0-no sensor. don't put into #ifdef compressorSensor!
#ifdef compressorSensor
uint8_t compressorTimeInterval = 60;  // **Interval-1. if compressor isn't turned-on within 60min, GSM will go OFF.
uint8_t compressorIfKey = 3;          // key 3=all access key, key1=entry, key0= lock.
uint8_t compressorElseKey = 3;        // key 3=all access key, key1=entry, key0= lock.
unsigned long compressorOffTime = 0;
int compressorState;
#define compressorPin A1  //5
#endif                    //compressorSensor

// Heartbeat ============================
#define heartbeat

#ifdef heartbeat
unsigned long previousHeartbeatTime = 0;
uint8_t heartbeatTimeInterval = 60;
#endif  // heartbeat

// #define ENABLE_NETWORK

char* api_data_var = "5";

// myDHT=================================
#ifdef myDHT

// dhtLib--------------------------------
#ifdef dhtLib
#include <dht.h>
#define dhtDataPin 5   // A1    // Temp/Hum Sensor is Connected to Pin 4// Edited to A1
#define DHTTYPE DHT22  // DHT 22  (AM2302)
dht DHT;               //(dhtDataPin, DHTTYPE);
#endif
// dhtLib--------------------------------

// dhtnewLib--------------------------------
#ifdef dhtnewLib
#include <dhtnew.h>
#define dhtDataPin 5
DHTNEW mySensor(dhtDataPin);
#endif
// dhtnewLib--------------------------------

#endif
//myDHT=================================

#ifdef DS18B20
#include <OneWire.h>
#include <DallasTemperature.h>
#define ONE_WIRE_BUS 8  // A1
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);
#endif

char strTemperatureValue[6];  // Arrary to Store Temperature Value
char strHumidityValue[6];     // Array to Store Humidity Value

byte doorPrevStatus = 0;
byte doorStatus = 0;
unsigned long previousMillis = 0;
boolean initialValue = false;
#include <EEPROM.h>          // EEPROM is used to Store Volatile Data
#include <SoftwareSerial.h>  // This Library is Used to Communicate with GSM

//#define GSM_PIN 8                   // GSM Power is Connected to Pin 8
SoftwareSerial gsmSerial(7, 6);  // RX, TX

uint8_t answer = 0;
// char aux_str[50];
//String smsSIMNumber;
byte gsmONOFF = 0;   // Check the Power Status of GSM
byte gsmStatus = 0;  // Check the Network Status of GSM
//byte messageFlag;
const uint8_t dataSendingInterval = 1;               // **Interval-2. data sending interval in minutes.  ******
const uint8_t compressorOffdataSendingInterval = 1;  // **Interval-3.    ******     ******     ******    ******

// 1. old api(works)
// const char* API_URL = "http://103.9.185.218/ams/api/add_data";

// 2. new api(not work)\

// const char* API_URL = "http://103.9.185.218/ams_new/public/api/device/v1/add?data=4,DEMO1|";


// 3. new api (corrected)
//const char* API_URL = "http://103.9.185.211/ems/public/api/device/v1/add?data=5,DEMO1|";
//const char* API_URL = "http://103.9.185.211/ems/public/api/device/v1/add?data=api_data_var,DEVICE_ID|";
const char* API_URL = "http://103.9.185.211/ems/public/api/device/v1/add?";

const size_t DATA_TEXT_LENGTH = 8;

byte confStatus = 0;  // Check if the Device is Configured or Not
byte initStatus = 0;  // Check if the Device is SET to Send Data
byte i = 0;

struct THSensorData {
  float Temperature;
  float Humidity;
};

//ALL FUNCTIONS
//**
int getTimeDifferenceInMinutes(unsigned long ulngTime1, unsigned long ulngTime2);
bool readDataFromTHSensor(THSensorData* pData);
bool floatToText(float flt, char* strData, size_t szDataLength);
bool getDeviceInfoFromEEPROM();
void initializeDevice();
void initializeDeviceSet();
byte getInitializationStatus();
void sendLastValue(float fltTemperature, float fltHumidity, int compressorState);
void restartGSM();
void turnOnGSM();
void turnOffGSM();  // Function to turn-Off the GSM
byte setNetworkGSM();
int8_t sendATcommand(char* ATcommand, char* expected_answer1, unsigned int timeout);
bool intToText(int intVal, char* strData, size_t szDataLength);
void compressorFunction(void);    // determine compressor status.
void noCompressorAction(void);    // some void-loop repeatetive actions independent of compressor.
void withCompressorAction(void);  // some void-loop repeatetive actions dependent upon compressor.
//**/

////////////////////////////////////// VOID SETUP /////////////////////////
///////////////////////////////////////////////////////////////////////////

void setup() {
  // Turn off builtin LED
  pinMode(DEFAULT_LED, OUTPUT);
  digitalWrite(DEFAULT_LED, LOW);

#ifdef ignitionSensor
  pinMode(ignitionPin, INPUT);
#endif
#ifdef compressorSensor
  pinMode(compressorPin, INPUT);
#endif

  Serial.begin(9600);

#ifdef ENABLE_NETWORK
  delay(3000);
  gsmSerial.begin(9600);
  //pinMode(GSM_PIN, OUTPUT);
  turnOffGSM();
  turnOnGSM();
  delay(30000);
#endif

#ifdef DHT
#ifdef myDHT
  DHT.setup(dhtDataPin);
  DHT.getMinimumSamplingPeriod();
#endif  //myDHT

#ifdef dhtnewLib
  mySensor.read();
#endif  //dhtnewLib

#endif  //DHT
}

////////////////////////////////////// VOID LOOP /////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////

void loop() {
  Serial.print("\n\n\n\n");
  Serial.print(code_version);
  Serial.println("\n");

////// VOLTAGE SENSOR //////
// IGNITION
#ifdef ignitionSensor
  ignitionState = readIgnitionState();
  if (ignitionState == 0) {
    Serial.println("Ignition State LOW!!");
  } else {
  }
#endif

  // Read temperature and humidity
  //    THSensorData data = {};
  //    if (readDataFromTHSensor(&data))
  //    {
  //       Serial.print("Temp:  "); Serial.println(data.Temperature);
  //       Serial.print("Hum:  "); Serial.println(data.Humidity);
  //    }
  //    else
  //    {
  //        // Read fail
  //#ifdef DEBUG
  //        Serial.println("Read failed");
  //#endif //DEBUG
  //    }  // End of read temperature and humidity.


  // COMPRESSOR
  //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^//
  //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^//
  if (compressorAdded == 1)  // compressor Sensor is connected.
  {
    withCompressorAction();

  } else  // compressorAdded ==0, which mean, no compressor sensor interfaced to ckt.
  {
    noCompressorAction();

  }  // compressorAdded=0.

  //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^//
  //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^//

}  // void loop()


//1//////////////////////////////////// getTimeDifferenceInMinutes() /////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

int getTimeDifferenceInMinutes(unsigned long ulngTime1, unsigned long ulngTime2) {
  int ulngDiff = int(((ulngTime1 - ulngTime2) / 1000) / 60);  // ulngTime1 - ulngTime2;
  return ulngDiff;
}

//2//////////////////////////////////// readDataFromTHSensor() /////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

bool readDataFromTHSensor(THSensorData* pData)  // Function to Check Temperature + Humidity Value
{
  if (pData == NULL) { return false; }

//myDHT=================================
#ifdef myDHT

// dhtLib--------------------------------------
#ifdef dhtLib
  float fltData = NaN;
  int readData = DHT.read22(dhtDataPin);  // Reads the data from the sensor
  if (!isnan(fltData = DHT.temperature)) { pData->Temperature = fltData; }
  fltData = NaN;
  if (!isnan(fltData = DHT.humidity)) { pData->Humidity = fltData; }
  return true;  // might have been missing..
#endif          // dhtLib
// dhtLib--------------------------------------


// dhtnewLib--------------------------------------
#ifdef dhtnewLib
  if (millis() - mySensor.lastRead() > 2000) {
    float fltData = NaN;
    mySensor.read();  // Reads the data from the sensor
    if (!isnan(fltData = mySensor.getTemperature())) {
      int i = 0;
      while ((i < 10) && (fltData > 130 || fltData < -40)) {
        i++;
        Serial.println(fltData);
        mySensor.read();
        fltData = mySensor.getTemperature();
        delay(300);
      }
      if (i < 9) {
        pData->Temperature = fltData;
      } else {
        pData->Temperature = 404;
      }
    }  // if(!isnan)

    fltData = NaN;
    if (!isnan(fltData = mySensor.getHumidity())) {
      int i = 0;
      while ((i < 10) && (fltData > 100 || fltData < 0)) {
        i++;
        Serial.println(fltData);
        mySensor.read();
        fltData = mySensor.getHumidity();
        delay(300);
      }
      if (i < 9) {
        pData->Humidity = fltData;
      } else {
        pData->Humidity = 404;
      }
    }  // if(!isnan)
    return true;
  }     //if
#endif  // dhtnewLib
  // dhtnewLib--------------------------------------


#endif  // myDHT
  //myDHT=================================


#ifdef DS18B20
  float fltData = NaN;
  sensors.requestTemperatures();  // Send the command to get temperature readings
  if (!isnan(fltData = sensors.getTempCByIndex(0))) {
    int i = 0;
    while ((i < 10) && (fltData > 130 || fltData < -40)) {
      i++;  // Serial.println(fltData);
      sensors.requestTemperatures();
      fltData = sensors.getTempCByIndex(0);
      delay(300);
    }
    if (i < 9) {
      pData->Temperature = fltData;
    } else {
      pData->Temperature = 404;
    }
    return true;
  }  // if(!isnan)


#endif  // ds18B20

  return false;
}  // readDataFromTHSensor()

//3//////////////////////////////////// floatToText() /////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

bool floatToText(float flt, char* strData, size_t szDataLength) {
  // flt = fltTemperature, strData = strTemperatureData,
  //szDataLength = DATA_TEXT_LENGTH

  if (strData == NULL || szDataLength == 0) { return false; }

  memset(strData, 0, szDataLength);
  dtostrf(flt, 4, 2, strData);

  return true;
}

//4//////////////////////////////////// getDeviceInfoFromEEPROM() //////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

// EEPROM
bool getDeviceInfoFromEEPROM()  // Function to check The Stored Values of EEPROM
{
  return true;
}

//5//////////////////////////////////// initializeDevice() //////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

void initializeDevice()  // Function to RESET Device
{
  EEPROM.write(1, '0');
}

//6//////////////////////////////////// initializeDeviceSet() ///////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

void initializeDeviceSet()  // Function to SET Device
{
  EEPROM.write(1, '1');
}

//7//////////////////////////////////// getInitializationStatus() ///////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

byte getInitializationStatus()  // Function to Check If the Device is in SET/RESET Mode
{
  if (EEPROM.read(1) == '1') {
    return 1;
  } else {
    return 0;
  }
}  // End of EEPROM

//8//////////////////////////////////// sendLastValue() ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////

#ifdef ENABLE_NETWORK

//void sendLastValue(float fltTemperature, int compressorState)
// This Function is Used to Send Device Data
void sendLastValue(float fltTemperature, float fltHumidity, int compressorState) {
  // Convert sensor data to text
  char strTemperatureData[DATA_TEXT_LENGTH];
  char strHumidityData[DATA_TEXT_LENGTH];

  memset(strTemperatureData, 0, DATA_TEXT_LENGTH);
  memset(strHumidityData, 0, DATA_TEXT_LENGTH);

  floatToText(fltTemperature, strTemperatureData, DATA_TEXT_LENGTH);
  floatToText(fltHumidity, strHumidityData, DATA_TEXT_LENGTH);
  // End of converting sensor data to text

  //////////////////////   TESTING   /////////////////////////
  char strCompressorData[DATA_TEXT_LENGTH];
  memset(strCompressorData, 0, DATA_TEXT_LENGTH);
  intToText(compressorState, strCompressorData, DATA_TEXT_LENGTH);  // Order: int, array, array length.
                                                                    ////////////////////////////////////////////////////////////

  answer = sendATcommand("AT+HTTPINIT", "OK", 10000);
  if (answer == 1) {
    answer = sendATcommand("AT+HTTPPARA=\"CID\",1", "OK", 5000);
    if (answer == 1) {
      char aux_str_local[150];

      // API SETUP
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      // 1. old api (works).
      //            snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%s?dev_id=%s&tem=%s&pid=1\"",
      //             API_URL, DEVICE_ID, strTemperatureData);  // pid=1 is also a para to be sent.

      // 2. new api (faulty).
      //              String humidity = "96.7"; //compressorState;
      //              snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%sT:%s&H:%s&DL:%s\"",
      //               API_URL, strTemperatureData, humidity, compressorState);  // pid=1 is also a para to be sent.

      // 3. new api (corrected).
      //            snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%sT:%s&DL:%s\"",
      //            API_URL, strTemperatureData, compressorState);


      //////////////////////////
      if (compressorAdded == 1) {
#ifdef myDHT
        // 4. new api (modified).
        snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%sdata=%s,%s|T:%s,H:%s,CS:%s\"",
                 API_URL, api_data_var, DEVICE_ID, strTemperatureData, strHumidityData, strCompressorData);
#endif  //myDHT

#ifdef DS18B20
        snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%sdata=%s,%s|T:%s,CS:%s\"",
                 API_URL, api_data_var, DEVICE_ID, strTemperatureData, strCompressorData);
#endif        //ds18b20
#endif        //compressorSensor
      } else  // compressorAdded ==0.
      {
#ifdef myDHT
        // 4. new api (modified).
        snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%sdata=%s,%s|T:%s,H:%s\"",
                 API_URL, api_data_var, DEVICE_ID, strTemperatureData, strHumidityData);
#endif  //myDHT

#ifdef DS18B20
        snprintf(aux_str_local, sizeof(aux_str_local), "AT+HTTPPARA=\"URL\",\"%sdata=%s,%s|T:%s\"",
                 API_URL, api_data_var, DEVICE_ID, strTemperatureData);
#endif   //ds18b20
      }  // compressorAdded ==0.

      //const char* API_URL = "http://103.9.185.211/ems/public/api/device/v1/add? data=api_data_var,DEVICE_ID|";
      //Sample url: http://103.9.185.211/ems/public/api/device/v1/add?data=5,DEMO1|T:0,H:0,CS:0
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      answer = sendATcommand(aux_str_local, "OK", 6000);
      if (answer == 1) {
        answer = sendATcommand("AT+HTTPACTION=0", "+HTTPACTION: 0,200", 20000);
        if (answer == 1) {
          initialValue = true;
          previousMillis = millis();
        }
        sendATcommand("AT+SAPBR=0,1", "OK", 10000);
      } else {
        restartGSM();
      }
    } else {
      restartGSM();
    }
  } else {
    restartGSM();
  }
  sendATcommand("AT+HTTPTERM", "OK", 5000);
}


//9//////////////////////////////////// restartGSM() ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////

void restartGSM()  // Function to Restart the GSM
{
  Serial.println("Restarting GSM");
  //digitalWrite(GSM_PIN, HIGH);
  sendATcommand("AT+CFUN=0", "OK", 5000);
  gsmONOFF = 0;
  gsmStatus = 0;
  Serial.println("SIM800L Power Info: ");
  sendATcommand("AT+CBC", "OK", 5000);
  delay(2000);
  sendATcommand("AT+CFUN=1", "OK", 5000);
  //digitalWrite(GSM_PIN, LOW);
  delay(15000);
  Serial.println("SIM800L Power Info: ");
  sendATcommand("AT+CBC", "OK", 5000);
  gsmONOFF = 1;
}  // end-restartGSM()

//10//////////////////////////////////// turnOnGSM() ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////

void turnOnGSM()  // Function to turn-on the GSM
{
  //digitalWrite(GSM_PIN, LOW);
  digitalWrite(DEFAULT_LED, HIGH);
  sendATcommand("AT+CFUN=1", "OK", 5000);
  delay(1000);
  gsmONOFF = 1;
  Serial.println("Turn on GSM");
  Serial.println("SIM800L Power Info: ");
  sendATcommand("AT+CBC", "OK", 5000);
}  // end-turnOnGSM()

//11//////////////////////////////////// turnOffGSM() ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////

void turnOffGSM()  // Function to turn-Off the GSM
{
  //digitalWrite(GSM_PIN, HIGH);
  digitalWrite(DEFAULT_LED, LOW);
  sendATcommand("AT+CFUN=0", "OK", 5000);
  delay(1000);
  gsmONOFF = 0;
  gsmStatus = 0;
  Serial.println("Turn OFF GSM");
}  // end-turnOffGSM()



//12//////////////////////////////////// setNetworkGSM() ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////

byte setNetworkGSM()  // Function to Configure GSM Network
{
  for (int i = 0; i < 3; i++) {
    boolean gsmConnection = false;
    for (int j = 0; j < 2; j++) {
      if (sendATcommand("AT+CREG?", "+CREG: 0,1", 2000) != 0) {
        gsmConnection = true;
        break;
      }
    }
    if (gsmConnection == true) {
      sendATcommand("AT+SAPBR=3,1,\"Contype\",\"GPRS\"", "OK", 2000);
      sendATcommand("AT+SAPBR=3,1,\"APN\",\"internet\"", "OK", 2000);
      sendATcommand("AT+SAPBR=3,1,\"USER\",\"\"", "OK", 2000);
      sendATcommand("AT+SAPBR=3,1,\"PWD\",\"\"", "OK", 2000);
      if (sendATcommand("AT+SAPBR=1,1", "OK", 25000) != 0) {
        return 1;
        break;
      }
    }
    restartGSM();
  }

  return 0;
}

//13//////////////////////////////////// sendATcommand() ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////

int8_t sendATcommand(char* ATcommand, char* expected_answer1, unsigned int timeout)  // Function to Communicate with GSM
{
  uint8_t x = 0;
  char response[200];
  unsigned long previous;
  answer = 0;
  memset(response, '\0', 200);  // Initialize the string
  delay(100);

#ifdef DEBUG
  Serial.println(ATcommand);
#endif  //DEBUG
  while (gsmSerial.available() > 0) gsmSerial.read();
  gsmSerial.println(ATcommand);  // Send the AT command
  x = 0;
  previous = millis();
  // this loop waits for the answer
  do {
    if (gsmSerial.available() != 0) {
      response[x] = gsmSerial.read();
      x++;
      // check if the desired answer is in the response of the module
      if (strstr(response, expected_answer1) != NULL) {
        answer = 1;
      }
    }
    // Waits for the answer with time out
  } while ((answer == 0) && ((millis() - previous) < timeout));

#ifdef DEBUG
  Serial.println(response);
#endif  //DEBUG
  if (answer == 0 && ATcommand == "AT+SAPBR=1,1") answer = 1;
  return answer;
}


//14//////////////////////////////////// intToText() /////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

bool intToText(int intVal, char* strData, size_t szDataLength) {
  if (strData == NULL || szDataLength == 0) { return false; }

  memset(strData, 0, szDataLength);
  itoa(intVal, strData, 10);  // intVal, char array, decimal indicator.
  return true;
}


//15//////////////////////////////////// compressorFunction() /////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

void compressorFunction(void) {
#ifdef compressorSensor
  if (analogRead(compressorPin) > 80) {
    if ((compressorIfKey == 1 || compressorIfKey == 3) && (compressorElseKey == 0 || compressorElseKey == 3)) {
      compressorIfKey = 0;
      compressorElseKey = 1;
      compressorState = 1;
      Serial.print("*Compressor State* = ");
      Serial.println(compressorState);
    }
  } else {
    if ((compressorIfKey == 0 || compressorIfKey == 3) && (compressorElseKey == 1 || compressorElseKey == 3)) {
      compressorIfKey = 1;
      compressorElseKey = 0;
      compressorState = 0;
      compressorOffTime = millis();
      Serial.print("*Compressor State* = ");
      Serial.println(compressorState);
    }
  }
  //float compressorOffTimeDifferenceInMinuites = getTimeDifferenceInMinutes(millis, compressorOffTime);

#endif  // compressorSensor
}  // end of function.


//16//////////////////////////////////// noCompressorAction() /////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

void noCompressorAction(void)  // some void-loop repeatetive actions independent of compressor.
{
  Serial.println("Function= noCompressorAction() ");
  // Read temperature and humidity
  THSensorData data = {};
  if (readDataFromTHSensor(&data)) {
    Serial.print("Temp:  ");
    Serial.println(data.Temperature);
    Serial.print("Hum:  ");
    Serial.println(data.Humidity);
  } else {
    // Read fail
#ifdef DEBUG
    Serial.println("Read failed");
#endif  //DEBUG
  }     // End of read temperature and humidity.

  int fltTimeDifferenceInMinuites = int(((millis() - previousMillis) / 1000 / 60));

#ifdef ENABLE_NETWORK
  sendATcommand("AT", "OK", 5000);

  gsmStatus = setNetworkGSM();
  if (gsmStatus == 1) {
    // if( (fltTimeDifferenceInMinuites)>=dataSendingInterval ) {   // to set time interval of sending data.
    while ((fltTimeDifferenceInMinuites) < dataSendingInterval) {
      fltTimeDifferenceInMinuites = int(((millis() - previousMillis) / 1000 / 60));
      THSensorData data = {};
      if (readDataFromTHSensor(&data)) {}
    }
    previousMillis = millis();
    Serial.print("\n**Data Sending Time Interval**: ");
    Serial.println((fltTimeDifferenceInMinuites));
    sendLastValue(data.Temperature, data.Humidity, compressorState);
  }
#endif  // ENABLE_NETWORK
}  // noCompressorAction()


//17//////////////////////////////////// withCompressorAction() /////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////

void withCompressorAction(void)  // some void-loop repeatetive actions dependent upon compressor.
{
  Serial.println("Function= withCompressorAction() ");
  // Read temperature and humidity
  THSensorData data = {};
  if (readDataFromTHSensor(&data)) {
    Serial.print("Temp:  ");
    Serial.println(data.Temperature);
    Serial.print("Hum:  ");
    Serial.println(data.Humidity);
  } else {
    // Read fail
#ifdef DEBUG
    Serial.println("Read failed");
#endif  //DEBUG
  }     // End of read temperature and humidity.

#ifdef compressorSensor

  compressorFunction();  // check compressor state.

  int compressorOffTimeDifferenceInMinuites = int(((millis() - compressorOffTime) / 1000) / 60);
  Serial.print("**compressorOffTimeDifferenceInMinuites = ");
  Serial.println(compressorOffTimeDifferenceInMinuites);
  Serial.print("Compressor Analog= ");
  Serial.println(analogRead(compressorPin));

  if (compressorState == 1) {
    compressorOffTime = millis();
    Serial.println("***  COMPRESSOR IS ON  ***");
    /////////////////////////////////////////////////////////////////

    int fltTimeDifferenceInMinuites = int(((millis() - previousMillis) / 1000 / 60));

#ifdef ENABLE_NETWORK
    sendATcommand("AT", "OK", 5000);

    gsmStatus = setNetworkGSM();
    if (gsmStatus == 1) {
      // if( (fltTimeDifferenceInMinuites)>=dataSendingInterval ) {   // to set time interval of sending data.
      while ((fltTimeDifferenceInMinuites) < dataSendingInterval) {
        compressorFunction();
        THSensorData data = {};
        if (readDataFromTHSensor(&data)) {}
        fltTimeDifferenceInMinuites = int(((millis() - previousMillis) / 1000 / 60));
      }
      previousMillis = millis();
      Serial.print("\n**Data Sending Time Interval**: ");
      Serial.println((fltTimeDifferenceInMinuites));
      sendLastValue(data.Temperature, data.Humidity, compressorState);
    }
#endif  // ENABLE NETWORK

  } else if ((compressorState == 0) && (int(compressorOffTimeDifferenceInMinuites) < compressorTimeInterval)) {
    Serial.print("***|   COMPRESSOR IS OFF AND TIME < ");
    Serial.println(compressorTimeInterval);
    /////////////////////////////////////////////////////////////////

    int fltTimeDifferenceInMinuites = int(((millis() - previousMillis) / 1000) / 60);

#ifdef heartbeat
    previousHeartbeatTime = millis();
#endif heartbeat

#ifdef ENABLE_NETWORK
    sendATcommand("AT", "OK", 5000);

    gsmStatus = setNetworkGSM();
    if (gsmStatus == 1) {

      // set time interval of sending data when compressor is OFF.
      // if( fltTimeDifferenceInMinuites >= compressorOffdataSendingInterval) {
      while ((fltTimeDifferenceInMinuites) < compressorOffdataSendingInterval) {
        compressorFunction();
        fltTimeDifferenceInMinuites = int(((millis() - previousMillis) / 1000 / 60));
        THSensorData data = {};
        if (readDataFromTHSensor(&data)) {}
      }
      Serial.print("** Data Sending Time Interval: ");
      Serial.println(int(fltTimeDifferenceInMinuites));
      sendLastValue(data.Temperature, data.Humidity, compressorState);
    }
#endif  // ENABLE_NETWORK


  } else if ((compressorState == 0) && (compressorOffTimeDifferenceInMinuites >= compressorTimeInterval)) {
    Serial.print("***|   COMPRESSOR IS OFF AND TIME GREATER THAN: ");
    Serial.print(compressorTimeInterval);
    Serial.println(" min!!   |***");
    compressorFunction();
    THSensorData data = {};
    if (readDataFromTHSensor(&data)) {}
    //turnOffGSM();
    //Serial.print("Compressor Off! GSM turned Off in Minutes: "); Serial.println( int(compressorOffTimeDifferenceInMinuites) );

#ifdef heartbeat

    if (uint8_t(((millis() - previousHeartbeatTime) / 1000 / 60)) >= heartbeatTimeInterval) {
      turnOnGSM();  // 1. turnOnGSM()

      // 2. Send data
#ifdef ENABLE_NETWORK
      sendATcommand("AT", "OK", 5000);

      gsmStatus = setNetworkGSM();
      if (gsmStatus == 1) {

        // set time interval of sending data when compressor is OFF.
        // if( fltTimeDifferenceInMinuites >= compressorOffdataSendingInterval) {
        //while( ( fltTimeDifferenceInMinuites)< compressorOffdataSendingInterval ){
        compressorFunction();
        //fltTimeDifferenceInMinuites = int(((millis() - previousMillis)/1000/60) );
        THSensorData data = {};
        if (readDataFromTHSensor(&data)) {}
        //}
        //Serial.print("** Data Sending Time Interval: "); Serial.println( int(fltTimeDifferenceInMinuites) );
        sendLastValue(data.Temperature, data.Humidity, compressorState);
      }
#endif  // ENABLE_NETWORK
      Serial.println(" HEARTBEAT SENT!! ");
      previousHeartbeatTime = millis();  // 3. clear time counter.
    }

#endif             // heartbeat
    turnOffGSM();  // 4. turnOffGSM()
    Serial.print("Compressor Off! GSM turned Off in Minutes: ");
    Serial.println(int(compressorOffTimeDifferenceInMinuites));

  }     // if(com==0 && interval> 60)
#endif  // compressorSensor
}  // withCompressorAction()
