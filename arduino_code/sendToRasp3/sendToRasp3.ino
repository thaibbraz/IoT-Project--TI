// EI.TI 2016-17
// Lab08
// Lab08_sendTemperatureToRaspberryPi.ino
#include <Process.h>

//+++++ CONSTANTES +++++
#define UrlRasp   "http://10.20.138.14/api/receberDados.php" // URL do Raspberry Pi
//-----

//+++++ VARIÁVEIS +++++
//-----

//***********************************************************************
//***************               PROTÓTIPOS                ***************
//***********************************************************************
String getTemp();
String getLux();
String getProx();
String getBotao();
String getLedAgua();
void postToRasp(String temp, String lux, String botao, String ledAgua);
int LEDAgua = 12;
int detetorAgua = 13;
int sensorAgua = 11;
float ultimaTemperatura=22;
//-----

//***********************************************************************
//***************                SETUP                    ***************
//***********************************************************************
void setup()
{
  //++++ Inicilização da porta série +++++
  Serial.begin(9600);
  while (!Serial);      // esperar até que se abra a consola ("Serial Monitor") para o programa continuar... (não funciona no Nano/uno/mega. ver : http://arduino.stackexchange.com/questions/4556/what-does-the-line-while-serial-do-in-an-arduino-program)
  Serial.println(F("\n[Teste: enviar para o Rasp]"));
  //-----
  pinMode(LEDAgua, OUTPUT);
  pinMode(detetorAgua, OUTPUT);
  //++++ Para comunicação entre o ATmega32U4 e o OpenWrt-Yún/Linino +++++
  // ver Figura 2
  Bridge.begin();

  //-----
}

//***********************************************************************
//***************                 LOOP                    ***************
//***********************************************************************
void loop()
{
  //++++ Obter a temperatura +++++
  Serial.print("A obter temperatura... ");
  String temp = getTemp();
  Serial.print(temp);
  Serial.println(" C");
  //-----


  //++++ Obter a agua +++++
  Serial.print("A obter led agua... ");
  String ledAgua = getLedAgua();
  Serial.println(ledAgua);

  //-----




  //++++ Obter a luminusidade +++++
  Serial.print("A obter luminusidade... ");
  String lux = getLux();
  Serial.println(lux);
  //-----

  //++++ Obter a proximidade +++++
  Serial.print("A obter proximidade... ");
  String prox = getProx();
  Serial.println(prox);
  //-----

  //++++ Obter o botao +++++
  Serial.print("A obter botao... ");
  String botao = getBotao();
  Serial.println(botao);
  //-----

  //++++ Obter o agua +++++
  Serial.print("A obter agua... ");
  String agua = getSensorAgua();
  Serial.println(agua);
  //-----

  Serial.println("---");

  //++++ Enviar dados para o Rasp +++++
  postToRasp(temp, lux, botao, ledAgua, agua);
  //-----

  delay(2000);
  float tempFloat = temp.toFloat();
  float luxFloat = lux.toFloat();

  // se a temperatura estiver alta e luminosidade baixa: regar
  if (tempFloat >= 30 && luxFloat > 700) { //(luminosidade < 300)== 0 && (luminosidade > 300)== 1
    //digitalWrite(LEDAgua, HIGH);
    digitalWrite(detetorAgua, HIGH);
  } else {
    //digitalWrite(LEDAgua, LOW);
    digitalWrite(detetorAgua, LOW);
  }

  if (luxFloat > 700) { //(luminosidade < 300)== 0 && (luminosidade > 300)== 1
    digitalWrite(LEDAgua, HIGH);
    //digitalWrite(detetorAgua, HIGH);
  } else {
    digitalWrite(LEDAgua, LOW);
    //digitalWrite(detetorAgua, LOW);
  }
}





/**   @brief  Obter a temperatura do sensor LM35
      @return  string com a temperatura em ºC
*/
String getTemp()
{
  // ler entrada analógica do pino 4 (A4)
  int sensor = analogRead(A2);
  // Conversão para ºC
  // 5.0=alimentação do sensor | 1024=resolução do ADC
  // 100.0=conversão de mV para ºC
  float temp = ((float)sensor * 5.0 / 1024.0) * 100.0;
  String tempStr = String((temp+ultimaTemperatura/2), 1);
  ultimaTemperatura=temp;
  return tempStr;
}
//-----

String getProx()
{
  // ler entrada analógica do pino 4 (A4)
  int sensor = analogRead(A1);
  String valor = String(sensor);
  return valor;
}
//-----


String getLedAgua()
{
  // ler entrada analógica do pino 4 (A4)
  int sensor = digitalRead(12);
  String valor = String(sensor);
  return valor;
}



String getLux()
{
  // ler entrada analógica do pino 4 (A4)
  int sensor = analogRead(A1);
  String valor = String(sensor);
  return valor;
}
//-----

String getBotao()
{
  // ler entrada analógica do pino 4 (A4)
  int sensor = digitalRead(13);
  String valor = String(sensor);
  return valor;
}
//-----


String getSensorAgua()
{
  // ler entrada analógica do pino 4 (A4)
  int sensor = analogRead(A5);
  String valor = String(sensor);
  return valor;
}
//-----





/**   @brief  Enviar temperatura do ar e data e hora para o serviço Web (POST JSON data)
      @param  tempAr - Temperatura do ar
      @param  dateTime - Data e hora da aquisição
*/
void postToRasp(String temp, String lux, String botao, String ledAgua, String agua)
{
  Serial.println("A enviar dados... ");
  // Formatação e execução do comando curl
  Process p;
  //String postData="temp="+temp+"&lux="+lux+"&prox="+prox+"&botao="+botao;

  // String curlData = "'{\"auth\": \"" + String(API_PASSWORD) + "\", ";
  // curlData += "\"key\": \"temperatura\", \"value\": \"" + tempAr + "\", \"date\": \"" + dateTime + "\"}'";
  p.runShellCommand("curl -X POST -F 'temp=" + temp + "' -F 'lux=" + lux +  "' -F 'botao=" + botao + "' -F 'ledAgua=" + ledAgua + "' -F 'agua=" + agua + "' " + UrlRasp);

  //Serial.println("COMANDO: curl -X POST -F 'temp=" + temp + "' -F 'lux=" + lux + "' -F 'botao=" + botao + "' " + UrlRasp);
  Serial.println("RESPOSTA:");
  // obtenção da resposta (podem ser várias linhas)
  while (p.available() > 0)
  {
    char c = p.read();
    Serial.print(c);
  }
  Serial.println("");
  Serial.println("");
}
//-----



