// Example testing sketch for various DHT humidity/temperature sensors
// Written by ladyada, public domain

//#include "DHT.h"
#include <Ethernet.h>
#include <SPI.h>
#define DHTPIN 9  
#define DHTTYPE DHT22   // DHT 22  (AM2302)

byte mac[] = { 0x90, 0xA2, 0xDA, 0x0F, 0x2A, 0x8D };
byte ip[] = { 10, 220, 216, 49 };
byte gw[] = {10,220,216,1};
byte subnet[] = { 255, 255, 255, 0 };

EthernetClient client;//(server, 80);

byte server[] = { 10, 220, 10, 24  }; // Server IP
float Data1 =0.0;
float Data2 =0.0;
float Data3 =0.0;
float Data4 =0.0;
int mq7_analogPin = A0;

//DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(9600);
  Ethernet.begin(mac, ip, gw, gw, subnet);
  delay(1000);
  //dht.begin();
}

void loop() {
  
  //float h = dht.readHumidity();
  //float t = dht.readTemperature();
  int mq7_value = analogRead(mq7_analogPin);
  delay(5000);
  if (isnan(Data1) || isnan(Data2) || isnan(Data3) || isnan(Data4)) {
    Serial.println("Failed to read from DHT");
  } else {
    senddata(Data1,Data2,Data3,Data4,mq7_value );
  }
}
void senddata(float Data1, float Data2, float Data3, float Data4,int mq7_value )
{

Serial.println();
Serial.println("ATE :)");
delay(10000);                                    //Keeps the connection from freezing

if (client.connect(server, 80)) {
Serial.println("Connected");
///mnt/volume-nyc1-01/html/rob/application/view/home
client.print("GET /mnt/rob/index.php?data=");
client.print(Data1);
client.print("&data1=");
client.print(Data2);
client.print("&data2=");
client.print(Data3);
client.print("&data3=");
client.print(Data4);
client.print("&data4=");

client.print(mq7_value );
client.println(" HTTP/1.1");
client.println("Host: 138.68.150.56");
client.println("Connection: close");
client.println();
Serial.println();
while(client.connected()) {
  while(client.available()) {
    Serial.write(client.read());
    }
   }
}

else
{
Serial.println("Connection unsuccesful");
}
//}
 //stop client
 client.stop();
 while(client.status() != 0)
{
  delay(5);
}
}
