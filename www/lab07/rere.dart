import 'package:flutter/material.dart';
import 'FMenu.dart';
import 'screens/first.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Test_1',
      theme: ThemeData(primarySwatch: Colors.amber),
      // scaffoldBackgroundColor: const Color.fromARGB(0, 0, 0, 255),
      home: FList(),
    );
  }
}

class FList extends StatefulWidget {
  // const Love({ Key? key }) : super(key: key);
  @override
  _FListState createState() => _FListState();
}

class _FListState extends State<FList> {
  List<FMenu> menu = [
    FMenu("1.กระเพราหมูกรอบ", "หมูกรอบผัดกระเพราหอมๆกรอบอร่อย",
        "assets/kapao.jpg"),
    FMenu(
        "2.ข้าวผัดไข่",
        "ข้าวสวยผัดร้อนๆกับไข่หอมๆพร้อมเครื่องเทศสุดแสนจะบรรยาย",
        "assets/kaowphud.jpg"),
    FMenu("3.คะน้าผัดน้ำมันหอย", "คะน้ากรอบๆผัดกับน้ำมันหอยหอมๆ",
        "assets/kananummunhoy.jpg"),
    FMenu("4.สุกี้แห้ง", "วุ้นเส้นผัดกับหมูพร้อมซอสสุกี้สูตรเด็ด",
        "assets/sukihang.jpg"),
    FMenu("5.ผัดซีอิ้ว", "เส้นใหญ่ผัดกับซีอิ้วหอมหนึบนุ่มอร่อยเสริฟร้อนๆ",
        "assets/phudseeeiw.jpg")
  ];
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("เมนูอาหาร"),
      ),
      body: ListView.builder(
          itemCount: menu.length,
          itemBuilder: (BuildContext context, int index) {
            FMenu food = menu[index];
            return ListTile(
              leading: Image.asset(food.img),
              title: Text(
                food.name,
                style: TextStyle(fontSize: 30),
              ),
              subtitle: Text(food.comp),
              onTap: () {
                print(index);
                Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => MenuScreen(),
                    ));
              },
            );
          }),
    );
  }
}

// class _FListState extends State<FList> {
//   @override
//   Widget build(BuildContext context) {
//     return Scaffold(
//         appBar: AppBar(title: Text("เมนูอาหาร")),
//         body:
//         Container(
//           child: ListView(
//             scrollDirection: Axis.vertical,
//             children: [
//             Card(margin: EdgeInsets.all(10),
//               child: Row(
//                 children: [
//                   Column(children: [Container(
//                     height: 220,
//                     width: 220,
//                     child: Image(
//                     image: AssetImage('assets/kapao.jpg')),
//                   )],
//                   ),
//                   Column(children: [Container(
//                    height:100, width: 20 ,
//                   )],),
//                   Column(children: [Container(
//                     height: 150, width: 150,
//                     child: Text('1.กระเพราหมูกรอบ\nหมูกรอบนอกนุ่มใน ข้าวสุกนอกดิบใน', style: TextStyle(fontSize: 18),),
//                   ),
//                   ],
//                   ),
//                   ],
//                   ),
//             ),
//             Card(margin: EdgeInsets.all(10),
//               child: Row(
//                 children: [
//                   Column(children: [Container(
//                     height: 220,
//                     width: 220,
//                     child: Image(
//                     image: AssetImage('assets/kaowphud.jpg')),
//                   )],
//                   ),
//                   Column(children: [Container(
//                    height:100, width: 20 ,
//                   )],),
//                   Column(children: [Container(
//                     height: 150, width: 150,
//                     child: Text('2.ข้าวผัดไข่\nน่าอร่อยสุดๆข้าวสวยผัดร้อนๆกับไข่หอมๆพร้อมเครื่องเทศสุดแสนจะบรรยาย', style: TextStyle(fontSize: 18),),
//                   ),
//                   ],
//                   ),
//                   ],
//                   ),
//             ),
//             Card(margin: EdgeInsets.all(10),
//               child: Row(
//                 children: [
//                   Column(children: [Container(
//                     height: 220,
//                     width: 220,
//                     child: Image(
//                     image: AssetImage('assets/kananummunhoy.jpg')),
//                   )],
//                   ),
//                   Column(children: [Container(
//                    height:100, width: 20 ,
//                   )],),
//                   Column(children: [Container(
//                     height: 150, width: 150,
//                     child: Text('3.คะน้าผัดน้ำมันหอย\nตะน้ากรอบๆผัดกับน้ำมันหอยหอมๆ', style: TextStyle(fontSize: 18),),
//                   ),
//                   ],
//                   ),
//                   ],
//                   ),
//             ),
//             Card(margin: EdgeInsets.all(10),
//               child: Row(
//                 children: [
//                   Column(children: [Container(
//                     height: 220,
//                     width: 220,
//                     child: Image(
//                     image: AssetImage('assets/sukihang.jpg')),
//                   )],
//                   ),
//                   Column(children: [Container(
//                    height:100, width: 20 ,
//                   )],),
//                   Column(children: [Container(
//                     height: 150, width: 150,
//                     child: Text('4.สุกี้แห้ง\nวุ้นเส้นผัดกับหมูพร้อมซอสสุกี้สูตรเด็ด', style: TextStyle(fontSize: 18),),
//                   ),
//                   ],
//                   ),
//                   ],
//                   ),
//             ),
//             Card(margin: EdgeInsets.all(10),
//               child: Row(
//                 children: [
//                   Column(children: [Container(
//                     height: 220,
//                     width: 220,
//                     child: Image(
//                     image: AssetImage('assets/phudseeeiw.jpg')),
//                   )],
//                   ),
//                   Column(children: [Container(
//                    height:100, width: 20 ,
//                   )],),
//                   Column(children: [Container(
//                     height: 150, width: 150,
//                     child: Text('5.ผัดซีอิ้ว\nเส้นใหญ่ผัดกับซีอิ้วหอมหนึบนุ่มอร่อยเสริฟร้อนๆ', style: TextStyle(fontSize: 18),),
//                   ),
//                   ],
//                   ),
//                   ],
//                   ),
//             ),

//             ],),
//         ));
//   }
// }