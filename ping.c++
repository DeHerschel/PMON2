#include <stdio.h>
#include <stdlib.h>
#include <iostream>
#include <string>
#include <algorithm>
#include <curl/curl.h>

using namespace std;
void sendJson(string jsonstr) {
	CURLcode ret;
	CURL *curl;
	string token = "b3OD8JBDyQzHYenlgl6yYGoHavnTVQcK8d2izHttvViCv2Jj6KPVyVBhPEVP";
	string c_token = "Authorization: Bearer "+token;
	struct curl_slist * headers;
	headers = NULL;
	headers = curl_slist_append(headers, "Content-Type: application/json");
	headers = curl_slist_append(headers, c_token.c_str());
	curl = curl_easy_init();
	curl_easy_setopt(curl, CURLOPT_URL, "http://192.168.1.38:8000/api/host/");
	curl_easy_setopt(curl, CURLOPT_NOPROGRESS, 1L);
	curl_easy_setopt(curl, CURLOPT_POSTFIELDS, jsonstr.c_str());
	curl_easy_setopt(curl, CURLOPT_USERAGENT, "curl/7.38.0");
	curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);
	curl_easy_setopt(curl, CURLOPT_MAXREDIRS, 50L);
	curl_easy_setopt(curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_easy_setopt(curl, CURLOPT_TCP_KEEPALIVE, 1L);
	ret = curl_easy_perform(curl);
	curl_easy_cleanup(curl);
	curl = NULL;
	curl_slist_free_all(headers);
	headers = NULL;

}
string* split(string str, char sep) {
	int seps = 0;
	int indexStart=0;
	int indexEnd=0;
	int inArray = 0;
	for (int i = 0; i < str.length(); i++){
		if (str[i] == sep) {
			seps++;
		}
	}
	string *array = new string[seps+1];
	for (int i = 0; i <= str.length(); i++) {
		if (str[i] == sep || i == str.length()) {
			string str2 = str.substr(indexStart,i-indexStart);
			array[inArray] = str2;
			inArray++;
			indexStart=i+1;
		}
	}
	return array;
}

string jsonfy(string ttl, string icmp_seq,string ip, string ptime){
	string json = "{\"ip\":\""+ip+"\",\"time\":\"" + ptime +"\",\"ttl\":\""+ttl+"\",\"icmp_seq\":\""+icmp_seq+"\"}";
	return json;
}

int main(int argc, char const *argv[]) {
	int nline = 0;
	string ttl;
	string icmp_seq;
	string ip;
	string ptime;
	for (string line; getline(cin, line);){
		if (nline != 0){
			string *array = split(line,' ');
			ttl = split(array[5],'=')[1];
			ptime = split(array[6], '=')[1];
			icmp_seq = split(array[4], '=')[1];
			ip = array[3].substr(0,array[3].length()-1);
			string json = jsonfy(ttl, icmp_seq,ip, ptime);			
			
			sendJson(json);
			
		}
		nline++;
	}
	return 0;
}
