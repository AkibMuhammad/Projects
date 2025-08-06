#include <Wire.h>
#include <MAX30100.h>

// Create a MAX30100 object.
MAX30100 sensor;

int ledPin;
// The pin that the LDR is connected to.
int ldrPin = 13;

// The color of the LED.
int ledColor = 0;

// The current reading from the LDR.
int ldrReading = 0;

// The minimum and maximum LDR readings.
int minLdrReading = 1023;
int maxLdrReading = 0;

// The threshold value for the LDR.
int threshold = 512;

void setup() {
  // Initialize the serial port.
  Serial.begin(9600);

  // Initialize the MAX30100 sensor.
  sensor.begin();

  // Set the LDR pin as an input.
  pinMode(ldrPin, INPUT);
}

void loop() {
  // Read the current value from the LDR.
  ldrReading = analogRead(ldrPin);

  // If the LDR reading is greater than the threshold, turn on the LED.
  if (ldrReading > threshold) {
    digitalWrite(ledPin, HIGH);
  } else {
    digitalWrite(ledPin, LOW);
  }

  // Update the min and max LDR readings.
  if (ldrReading < minLdrReading) {
    minLdrReading = ldrReading;
  }
  if (ldrReading > maxLdrReading) {
    maxLdrReading = ldrReading;
  }

  // Calculate the range of LDR readings.
  int range = maxLdrReading - minLdrReading;

  // Calculate the current LED color.
  ledColor = map(ldrReading, minLdrReading, maxLdrReading, 0, 255);

  // Set the LED color.
  analogWrite(ledPin, ledColor);

  // Delay for a millisecond.
  delay(1);
}
