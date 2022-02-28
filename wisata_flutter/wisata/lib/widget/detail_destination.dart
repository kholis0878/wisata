// @dart=2.9

import 'package:flutter/material.dart';
import 'package:flutter_html/flutter_html.dart';

class DetailDestination extends StatelessWidget {
  List listDestination;
  int index;
  DetailDestination({ this.listDestination, this.index});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('${listDestination[index]['name']}'),
        backgroundColor: Colors.redAccent,
      ),

      body: new ListView(
        padding: EdgeInsets.all(16.0),
        children: [
          new Image.network('${listDestination[index]['photo']}'),
          new Container(
            padding: const EdgeInsets.all(32.0),
            child: new Text('${listDestination[index]['name']}', style: new TextStyle(fontWeight: FontWeight.bold),),
          ),
          new Container(
            padding: const EdgeInsets.all(32.0),
            child: Html(data: listDestination[index]['content'],),
          )
        ],
      ),
    );
  }
}