#include <SoftwareSerial.h>
SoftwareSerial Bluetooth(2, 3); // RX, TX
int speakerPin = 8;
int touchSensorPin = 2;
int LEDPin = 7;
int greenLEDPin = 4;

void setup() {
  pinMode(speakerPin, OUTPUT);
  Bluetooth.begin(9600);
  pinMode(touchSensorPin, INPUT);
  pinMode(LEDPin, OUTPUT);
  pinMode(greenLEDPin, OUTPUT);
}

void loop() {
  int touchValue = digitalRead(touchSensorPin);
  if (Bluetooth.available()) {
    char command = Bluetooth.read();
    if (command == '1') {
      tone(speakerPin, 440); // play A4 note
    } else if (command == '0') {
      noTone(speakerPin); // stop playing
    }
  }
  if (touchValue == HIGH) {
    digitalWrite(LEDPin, HIGH);
    digitalWrite(greenLEDPin, LOW);
  } else {
    digitalWrite(LEDPin, LOW);
    digitalWrite(greenLEDPin, HIGH);
  }
}