import 'package:dio/dio.dart';

Future<List> getDestination() async {
  var dio = Dio();
  Response response = await dio.get('http://localhost/praktikum_se7/wisata/public/api/destination');
  return response.data['data'];
}