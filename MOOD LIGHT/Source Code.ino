// Import the necessary libraries
#include <Wire.h>

// Defining the pins for the potentiometer, touchsensor and LEDs
const int potentiometerPin = A0;
const int touchPin = 2;
const int led1Pin = 5;
const int led2Pin = 6;
const int led3Pin = 7;

// Create a variable to store the value of the potentiometer
int potentiometerValue;
int touchValue;
// Setup
void setup() {
  // Initialize the Serial port
  Serial.begin(9600);

  // Set the potentiometer as an input
  pinMode(potentiometerPin, INPUT);
  pinMode(touchPin, INPUT);
  // Set the LEDs as outputs
  pinMode(led1Pin, OUTPUT);
  pinMode(led2Pin, OUTPUT);
  pinMode(led3Pin, OUTPUT);
}

// Loop
void loop() {
  // Read the value of the potentiometer
  potentiometerValue = analogRead(potentiometerPin);
  touchValue = digitalRead(touchPin);
  // If the potentiometer value is less than 250, turn on the first LED
  if (potentiometerValue < 200) {
    digitalWrite(led1Pin, LOW);
    digitalWrite(led2Pin, LOW);
    digitalWrite(led3Pin, LOW);
  if (touchValue == HIGH)
  {
    digitalWrite(led1Pin, HIGH);
    digitalWrite(led2Pin, HIGH);
    digitalWrite(led3Pin, HIGH);
  }
  }
  else if (potentiometerValue < 500) {
    digitalWrite(led1Pin, HIGH);
    digitalWrite(led2Pin, LOW);
    digitalWrite(led3Pin, LOW);
  }
  else if (potentiometerValue < 500 || touchValue == HIGH) {
    digitalWrite(led1Pin, HIGH);
    digitalWrite(led2Pin, LOW);
    digitalWrite(led3Pin, LOW);
  }
  else if (potentiometerValue < 600) {
    digitalWrite(led1Pin, LOW);
    digitalWrite(led2Pin, HIGH);
    digitalWrite(led3Pin, LOW);
  }
  else if (potentiometerValue < 600) {
    digitalWrite(led1Pin, LOW);
    digitalWrite(led2Pin, HIGH);
    digitalWrite(led3Pin, LOW);
  }  
  else if (potentiometerValue < 700) {
    digitalWrite(led1Pin, LOW);
    digitalWrite(led2Pin, LOW);
    digitalWrite(led3Pin, HIGH);
  }
  // If the potentiometer value is greater than 500, turn on the third LED
  else {
    digitalWrite(led1Pin, LOW);
    digitalWrite(led2Pin, LOW);
    digitalWrite(led3Pin, LOW);
  }
}
