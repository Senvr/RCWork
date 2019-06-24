
int IN1 = 9;       //control pin for first motor
int IN2 = 8;       //control pin for first motor
int IN3 = 7;        //control pin for second motor
int IN4 = 6;        //control pin for second motor

long duration;
int distance;
bool scream = false;
const int trigPin = 2;
const int echoPin = 3;
int maxdist = 50;
int screampin = 5;
bool blinkState=true;
#define LED_PIN 13
void setup() {
  pinMode(IN1, OUTPUT);  
  pinMode(IN2, OUTPUT);
  pinMode(IN3, OUTPUT);  
  pinMode(IN4, OUTPUT);
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  pinMode(screampin, OUTPUT); //SCREAMPIN OUT
  analogWrite(screampin,0);
  Serial.begin(115200);
  pinMode(LED_PIN, OUTPUT);
}
int maxtime=30;
unsigned long timeout=50000;
unsigned long timeTook=0;
unsigned long currentMicros=1;
int getdist(){
  currentMicros=micros();
  blinkState = !blinkState;
  digitalWrite(LED_PIN, blinkState);
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  duration = pulseIn(echoPin, HIGH,50000);
  distance= duration*0.034/2; // in cm
  //Serial.print("Took: ");
  timeTook=micros()-currentMicros;
  //Serial.println(timeTook);
  //Serial.print("Equation: ");
  //Serial.println(timeout-timeTook);
  delayMicroseconds(timeout-timeTook);
  if(distance <= 4){
  return;
  }
  return distance; 
}

void track1(int x){
 if(x > 0){
    Serial.println("t1 fw");
    digitalWrite(IN3, HIGH);
    digitalWrite(IN4, LOW);
 }
 else if(x < 0){
    Serial.println("t1 bk");
    digitalWrite(IN3, LOW);
    digitalWrite(IN4, HIGH);
 }
 else{
 Serial.println("t1 st");
 digitalWrite(IN3, LOW);
 digitalWrite(IN4, LOW); 
 }
}
//Pins 1 and 2
void track2(int x){
 if(x > 0){
    Serial.println("t2 fw");
    digitalWrite(IN1, HIGH);
    digitalWrite(IN2, LOW);
    return;
 }
 else if(x < 0){
    Serial.println("t2 bk");
    digitalWrite(IN1, LOW);
    digitalWrite(IN2, HIGH);
    return;
 }
 else{
 Serial.println("t2 st");
 digitalWrite(IN1, LOW);
 digitalWrite(IN2, LOW); 
 return;
 }
}

unsigned long previousMillis = 0;
int indata;
byte byteData;
long interval = 10;  
void loop() {
   if (millis() - previousMillis >= interval) {
   distance=getdist();
   Serial.print("dist_");
   if(distance > 278){
    Serial.print(distance);
    Serial.println("+");
   }else{
    Serial.println(distance); 
   }
   if (Serial.available() > 0) {
   indata=Serial.read();
   indata;
   byteData=(int)indata;
   Serial.println(indata);
   if(indata == 108){
    track1(1);
    track2(-1);
   }
   else if(indata == 114){
    track1(-1);
    track2(1);
   }
   else if(indata == 102){
    track1(1);
    track2(1);
   }
   else if(indata == 98){
    track1(-1);
    track2(-1);
   }else{
    Serial.print("UN_");
    Serial.println(indata);
    track1(0);
    track2(0);
   }
   Serial.flush(); 
   previousMillis=millis();
   }
   
   }
}
