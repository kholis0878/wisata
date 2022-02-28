import 'package:flutter/material.dart';
import 'package:wisata/api/category_api.dart';
import 'package:wisata/api/destination_api.dart';
import 'package:wisata/widget/category_destination.dart';
import 'package:wisata/widget/list_destination.dart';

class HomeScreen extends StatefulWidget {
  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  List listCategory = [];

  @override
  void initState() {
    getCategory().then((value) {
      setState(() {
        listCategory = value;
      });
    });
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        appBar: AppBar(
          title: Text("Pariwisata Banjarmasin"),
          backgroundColor: Colors.redAccent,
        ),
        drawer: new Drawer(
          child: FutureBuilder<List>(
            future: getCategory(),
            builder: (context, snapshot) {
              if (snapshot.hasData) {
                return ListView.builder(
                  itemCount: snapshot.requireData.length,
                  itemBuilder: (context, index) {
                    return ListTile(
                      title: Text(snapshot.requireData[index]['name']),
                      onTap: () {
                        Navigator.of(context).push(MaterialPageRoute(
                            builder: (context) =>
                                CategoryDestination(listCategory[index])));
                      },
                    );
                  },
                );
              }
              return CircularProgressIndicator();
            },
          ),
        ),
        body: SingleChildScrollView(
          child: FutureBuilder<List>(
              future: getDestination(),
              builder: (context, snapshot) {
                if (snapshot.hasError) print(snapshot.error);
                return snapshot.hasData
                    ? new ListDestination(listDestination: snapshot.requireData)
                    : new Center(
                        child: CircularProgressIndicator(),
                      );
              }),
        ),
      ),
    );
  }
}
