import 'package:dio/dio.dart';
import 'package:flutter/material.dart';
import 'package:wisata/widget/detail_destination.dart';

class CategoryDestination extends StatelessWidget {
  final Map category;
  CategoryDestination(this.category);

  Future<List> getCategoryDestination() async {
    final id = category['id'];
    var response = await Dio()
        .get('http://localhost/praktikum_se7/api/destination/category/${id}');
    return response.data['data'];
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(category['name']),
        backgroundColor: Colors.redAccent,
      ),
      body: FutureBuilder<List>(
        future: getCategoryDestination(),
        builder: (context, snapshot) {
          if (snapshot.hasData) {
            return ListView.builder(
                itemCount: snapshot.requireData.length,
                itemBuilder: (context, index) {
                  return Container(
                    padding: const EdgeInsets.all(8.0),
                    child: new Card(
                      child: InkWell(
                        onTap: () {
                          Navigator.of(context).push(MaterialPageRoute(
                              builder: (context) => DetailDestination(
                                  listDestination: snapshot.requireData,
                                  index: index)));
                        },
                        child: new ListTile(
                          leading: Image.network(
                            "${snapshot.requireData[index]['photo']}",
                            width: 100,
                            fit: BoxFit.cover,
                          ),
                          title: new Text(
                            "${snapshot.requireData[index]['name']}",
                            style: new TextStyle(
                                fontWeight: FontWeight.bold,
                                color: Colors.black87),
                          ),
                          subtitle:
                              new Text("${snapshot.requireData[index]['district']}"),
                        ),
                      ),
                    ),
                  );
                });
          }
          return CircularProgressIndicator();
        },
      ),
    );
  }
}
