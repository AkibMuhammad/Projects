#include <SPI.h>
#include <MFRC522.h>
#include <Ethernet.h>

#define SS_PIN 7
#define RST_PIN 6

//const char* baseUrl = "52.77.121.171";
const char* baseUrl = "52.77.121.171";

int port = 3001;
String stationLoc = "HO_BASEMENT";

int buzzer = 3;
int ledRed = 4;
int ledGreen = 5;

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };

//For Static IP. Don't required in DHCP
IPAddress ip(10, 50, 102, 177);
IPAddress myDns(10, 50, 1, 1);
IPAddress gateway(10, 50, 102, 1);
IPAddress subnet(255, 255, 255, 0);

EthernetClient ethClient;

MFRC522 rfid(SS_PIN, RST_PIN);  // Instance of the class

MFRC522::MIFARE_Key key;

// Init array that will store new NUID
byte nuidPICC[4];

void setup() {
  Serial.begin(115200);
  SPI.begin();      // Init SPI bus
  rfid.PCD_Init();  // Init MFRC522

  for (byte i = 0; i < 6; i++) {
    key.keyByte[i] = 0xFF;
  }

  Serial.println(F("This code scan the MIFARE Classsic NUID."));
  Serial.print(F("Using the following key:"));
  printHex(key.keyByte, MFRC522::MF_KEY_SIZE);

  Ethernet.init(10);
  //LED
  pinMode(ledRed, OUTPUT);
  pinMode(ledGreen, OUTPUT);
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, LOW);
  //Buzzer
  pinMode(buzzer, OUTPUT);
  digitalWrite(buzzer, LOW);
  //OnInt Blink LED
  delay(500);
  digitalWrite(ledRed, HIGH);
  digitalWrite(ledGreen, HIGH);
  delay(500);
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, LOW);

  //Ethernet initilize
  Ethernet.begin(mac);

  // Check for Ethernet hardware present
  if (Ethernet.hardwareStatus() == EthernetNoHardware) {
    Serial.println("Ethernet shield was not found.  Sorry, can't run without hardware.");
    while (true) {
      delay(1);  // do nothing, no point running without Ethernet hardware
    }
  }

  if (Ethernet.linkStatus() == LinkOFF) {
    Serial.println("Ethernet cable is not connected.");
  }

  //Print assigned ip address
  Serial.print("IP ddress:");
  Serial.println(Ethernet.localIP());
}

void onlineBlink() {
  digitalWrite(buzzer, HIGH);
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, HIGH);
  delay(500);
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, LOW);
  digitalWrite(buzzer, LOW);
}

void offlineBlink() {
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, LOW);
  delay(500);
  digitalWrite(ledRed, HIGH);
  digitalWrite(ledGreen, LOW);
  delay(500);
  digitalWrite(ledRed, LOW);
  digitalWrite(ledGreen, LOW);
}

uint8_t successReadS = 0;
uint32_t toint;
void loop() {

  successReadS = getID();

  if (successReadS == 1) {
    uint32_t cardID = toint;
    if (ethClient.connect(baseUrl, port)) {
      Serial.print("connected to ");
      Serial.println(ethClient.remoteIP());
      // Make a HTTP request:
      ethClient.println("GET /checkin/" + stationLoc + "/" + cardID + " HTTP/1.1");
      ethClient.println("Host: localhost");
      ethClient.println("Connection: close");
      ethClient.println();
      ethClient.stop();
      onlineBlink();
    } else {
      // if you didn't get a connection to the server:
      offlineBlink();
      Serial.println("connection failed");
    }
  } else {
    //machine idle mode
    digitalWrite(ledRed, HIGH);
    digitalWrite(ledGreen, LOW);
  }
  successReadS = 0;
}

uint8_t getID() {

  // Getting ready for Reading PICCs
  if (!rfid.PICC_IsNewCardPresent()) {  //If a new PICC placed to RFID reader continue
    return 0;
  }
  if (!rfid.PICC_ReadCardSerial()) {  //Since a PICC placed get Serial and continue
    return 0;
  }

  int temp = 0;
  while (temp == 0) {

    //Serial.print("Card UID:");//Dump UID
    String rfidUid = "";
    for (byte i = 0; i < rfid.uid.size; i++) {
      rfidUid += String(rfid.uid.uidByte[i] < 0x10 ? "0" : "");
      rfidUid += String(rfid.uid.uidByte[i], DEC);
    }
    toint = rfidUid.toInt();
    Serial.println(toint);
    rfid.PICC_HaltA();  // Halt PICC
    temp = 1;
    return 1;
    break;
  }
  return 0;
}
void printHex(byte* buffer, byte bufferSize) {
  for (byte i = 0; i < bufferSize; i++) {
    Serial.print(buffer[i] < 0x10 ? " 0" : " ");
    Serial.print(buffer[i], HEX);
  }
}
