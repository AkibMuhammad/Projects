#include <Servo.h>


Servo servoMotor1;


int triggerPin = 11;


int echoPin = 10;

int servoMotor = 3;


long distance;


long duration;


void setup() 


{


servoMotor1.attach(servoMotor); 


 pinMode(triggerPin, OUTPUT);


 pinMode(echoPin, INPUT);// put your setup code here, to run once:


}


void loop(){

  ultra_sonic();
  servoMotor1.write(0);


  if(distance <=9)


  {


  servoMotor1.write(180);


  }


}


void ultra_sonic()


{


  digitalWrite(triggerPin, LOW);


  delayMicroseconds(2);


  digitalWrite(triggerPin, HIGH);


  delayMicroseconds(10);


  digitalWrite(triggerPin, LOW);


  duration = pulseIn(echoPin, HIGH);


  distance = duration*0.034/2;


  }
