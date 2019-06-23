
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
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  pinMode(screampin, OUTPUT); //SCREAMPIN OUT
  analogWrite(screampin,0);
  Serial.begin(9600);
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
unsigned long previousMillis = 0;
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
   previousMillis=millis();
   }
   
   
}
