// @dart=2.9

import 'package:flutter/material.dart';
import 'package:wisata/widget/detail_destination.dart';

class ListDestination extends StatelessWidget {
  final List listDestination;
  ListDestination({ this.listDestination});

  @override
  Widget build(BuildContext context) {
    return new ListView.builder(
      scrollDirection: Axis.vertical,
      shrinkWrap: true,
      itemCount: listDestination == null ? 0 : listDestination.length,
      itemBuilder: (context, index){
        return InkWell(
          onTap: (){
            Navigator.of(context).push(new MaterialPageRoute(builder: (context) => DetailDestination(listDestination: listDestination, index: index),
            ));
          },
          child: Container(
            padding: const EdgeInsets.all(8.0),
            child: new Card(
              child: new ListTile(
                leading: Image.network(listDestination[index]['photo'], width: 100, fit: BoxFit.cover,
                ),
                title: new Text(
                  listDestination[index]['name'], 
                  style: new TextStyle(
                    fontWeight: FontWeight.bold,
                    color: Colors.black87
                  ),
                ),
                subtitle: Text("${listDestination[index]['category']} | ${listDestination[index]['district_name']}"),
              ),
            ),
          ),
        );
      });
  }
}