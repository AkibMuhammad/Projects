#define outputA 9
#define outputB 10

int counter = 0;
int aState;
int aLastState;
int RPWM_Output = 5;  // Arduino PWM output pin 5; connect to IBT-2 pin 1 (RPWM)
int LPWM_Output = 6;  // Arduino PWM output pin 6; connect to IBT-2 pin 2 (LPWM)
int forwardPWM = 200;
int reversePWM = 200;

void setup() {
  pinMode(outputA, INPUT);
  pinMode(outputB, INPUT);
  pinMode(RPWM_Output, OUTPUT);
  pinMode(LPWM_Output, OUTPUT);

  Serial.begin(9600);
  // Reads the initial state of the outputA
  aLastState = digitalRead(outputA);
}

void loop() {
  aState = digitalRead(outputA);  // Reads the "current" state of the outputA
  // If the previous and the current state of the outputA are different, that means a Pulse has occured
  if (aState != aLastState) {
    // If the outputB state is different to the outputA state, that means the encoder is rotating clockwise
    if (digitalRead(outputB) != aState) {
      counter++;
      if (counter >= 42) {
        motorCW();
      }
    } else {
      counter--;
      if (counter <= -42) {
        motorCCW();
      }
    }
    if (counter == 0) {
      motorStop();
    }
    Serial.print("Position: ");
    Serial.println(counter);
  }
  aLastState = aState;  // Updates the previous state of the outputA with the current state
}

void motorCW() {
  Serial.print("Motor Clockwise");
  delay(1000);
  analogWrite(RPWM_Output, forwardPWM);
  analogWrite(LPWM_Output, 0);
  return 0;
}
void motorCCW() {
  Serial.print("Motor Counter Clockwise");
  delay(1000);
  analogWrite(LPWM_Output, reversePWM);
  analogWrite(RPWM_Output, 0);
  return 0;
}
void motorStop() {
  Serial.print("Motor Stopped");
  //delay(1000);
  analogWrite(LPWM_Output, 0);
  analogWrite(RPWM_Output, 0);
  return 0;
}
