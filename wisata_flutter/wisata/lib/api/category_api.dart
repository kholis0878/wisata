import 'package:dio/dio.dart';

Future<List> getCategory() async {
  var dio = Dio();
  Response response = await dio.get('http://localhost/praktikum_se7/wisata/public/api/category');
  return response.data['data'];
}