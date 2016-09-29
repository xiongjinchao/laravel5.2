@extends('layouts.adminlte.main')

@section('css')
@endsection

@section('content')


@endsection

@section('script')
    <script>
    var result = {};
    var origin = {};
    var sort = ''; //排序方式 格式为averagePriceTax.asc
    $(function(){
        //ajax 获取源数据
        origin = {
            code: 100000,
            message: "OK",
            data: {
                "adultNumber":"2",//（按入参返回，熊进超加）
                "childNumber":"1",//（按入参返回，熊进超加）
                "total": "80",
                "directFlightTotal": "5",//直飞航班数量
                "routings": [
                    {
                        "adultPrice": 6011,//成人单价（以元为单位）
                        "adultTax": 188,//成人税费（以元为单位）
                        "adultTaxType": 0,//成人税费类型：0 未含税 / 1 已含税
                        "applyType": 0,//报价类型：0 预定价 / 1 申请价
                        "childPrice": 6011,//儿童单价（以元为单位）
                        "childTax": 188,//儿童税费（以元为单位）
                        "childTaxType": 0,//儿童税费类型：0 未含税 / 1 已含税
                        "averagePriceTax":6091,//（均价含税，熊进超加）价格为单人票价格，如果成人>0并且儿童>0，价格显示为均价，计算方法：(成人含税总价+儿童含税总价)/(成人人数+儿童人数)；
                        "averageTax":188,//（均价税，熊进超加）计算方法：(成人税总价+儿童税总价)/(成人人数+儿童人数)；
                        "tripType": 1,//是否是直飞航班；-1：转机航班，0：全部航班，1：直飞航班；默认为0
                        "data": "H8KLCAAAAAAAAABdwo87C8OCQBDChMO/SmDDmzvDnUduc8KXNMOGw7jCghQRJMKQNFrCqsKNNsO6w7/DnQhCEGbCh8OZwo9pwqZew7fCp8OLw47ChwRMwqzCkmNAwoLDo8K2w7XCh3bDr8OswrzDpcKqGVwzwphLXljCkMKEFSPCqUfDsUQZYcKJwpPClnMmZcKYwpjDuzHDgQzDk1/Djxhxw4kTwqtGN8KCIsORAsOPFMKjw7nDvMKBwqDCnMKUcxRmwqLCglIAwoTDm8O7w756PsKuUH8HwqwGw5INw5gCwo4pFkHCoXPDnQfDhcOUIMK1w5sAAAA=_U0hJSklFOTk=_MTM=_NzgxODU=",
                        "fromSegments": [//去程
                            {
                                "aircraftCode": "333",//机型
                                "arrAirport": "HKG",//到达机场 IATA 三字码
                                "arrAirportName": "香港机场",//到达机场（熊进超加）
                                "arrCityName": "香港",//到达城市（熊进超加）
                                "arrTime": "201603111351",//到达日期时间，格式：YYYYMMDDHHMM  例：201203101305 表示 2012年3月10日13时5分
                                "cabin": "Y",//舱位 玖玖机票中未指出Y的含义，应该还有其他值
                                "cabinCount": "9",//舱位个数
                                "carrier": "CX",//航司 IATA 二字码，必须与 flightNumber 航司相同，可以用来获取航空公司的LOGO
                                "carrierName": "吉祥航空公司",//航司中文名（熊进超加）
                                "codeShare": false,//代码共享标识（true 代码共享/false 非代码共享）
                                "depAirport": "PEK",//出发机场 IATA 三字码
                                "depAirportName": "北京首都国际机场",//出发机场（熊进超加）
                                "depCityName": "北京",//出发城市（熊进超加）
                                "depTime": "201603111001",//起飞日期时间，格式：YYYYMMDDHHMM  例：201203100300 表示 2012 年 3 月 10 日 3 时 0 分
                                "destinationTerminal": "",
                                "duration": 240,//飞行时长，单位为分钟，通过时差转换后的结果
                                "flightNumber": "CX347",//航班号，如：CA123。航班号数字前若有多余的数字 0，必须去掉，如 CZ006 需返回 CZ6
                                "maxSeat": "9",//可预订的座位数，最大为 9 (注：如为多段行程，只取最小值)
                                "originTerminal": "",//出发航站楼
                                "stopCities": ""//经停地，/分隔城市三字码
                            }
                        ],
                        "ticketInvoiceType": 1//报销凭证类型：0行程单/1旅行发票,如果该字段没有，或者为空，默认为行程单类型
                    },
                    {
                        "adultPrice": 6012,//成人单价（以元为单位）
                        "adultTax": 188,//成人税费（以元为单位）
                        "adultTaxType": 0,//成人税费类型：0 未含税 / 1 已含税
                        "applyType": 0,//报价类型：0 预定价 / 1 申请价
                        "childPrice": 6011,//儿童单价（以元为单位）
                        "childTax": 188,//儿童税费（以元为单位）
                        "childTaxType": 0,//儿童税费类型：0 未含税 / 1 已含税
                        "tripType": 1,//是否是直飞航班；-1：转机航班，0：全部航班，1：直飞航班；默认为0
                        "averagePriceTax":6012,//（均价含税，熊进超加）价格为单人票价格，如果成人>0并且儿童>0，价格显示为均价，计算方法：(成人含税总价+儿童含税总价)/(成人人数+儿童人数)；
                        "averageTax":188,//（均价税，熊进超加）计算方法：(成人税总价+儿童税总价)/(成人人数+儿童人数)；
                        "data": "H8KLCAAAAAAAAABdwo87C8OCQBDChMO/SmDDmzvDnUduc8KXNMOGw7jCghQRJMKQNFrCqsKNNsO6w7/DnQhCEGbCh8OZwo9pwqZew7fCp8OLw47ChwRMwqzCkmNAwoLDo8K2w7XCh3bDr8OswrzDpcKqGVwzwphLXljCkMKEFSPCqUfDsUQZYcKJwpPClnMmZcKYwpjDuzHDgQzDk1/Djxhxw4kTwqtGN8KCIsORAsOPFMKjw7nDvMKBwqDCnMKUcxRmwqLCglIAwoTDm8O7w756PsKuUH8HwqwGw5INw5gCwo4pFkHCoXPDnQfDhcOUIMK1w5sAAAA=_U0hJSklFOTk=_MTM=_NzgxODU=",
                        "fromSegments": [//去程
                            {
                                "aircraftCode": "333",//机型
                                "arrAirport": "HKG",//到达机场 IATA 三字码
                                "arrAirportName": "香港机场",//到达机场（熊进超加）
                                "arrCityName": "香港",//到达城市（熊进超加）
                                "arrTime": "201603111350",//到达日期时间，格式：YYYYMMDDHHMM  例：201203101305 表示 2012年3月10日13时5分
                                "cabin": "Y",//舱位 玖玖机票中未指出Y的含义，应该还有其他值
                                "cabinCount": "9",//舱位个数
                                "carrier": "CX",//航司 IATA 二字码，必须与 flightNumber 航司相同，可以用来获取航空公司的LOGO
                                "carrierName": "吉祥航空公司",//航司中文名（熊进超加）
                                "codeShare": false,//代码共享标识（true 代码共享/false 非代码共享）
                                "depAirport": "PEK",//出发机场 IATA 三字码
                                "depAirportName": "北京首都国际机场",//出发机场（熊进超加）
                                "depCityName": "北京",//出发城市（熊进超加）
                                "depTime": "201603111000",//起飞日期时间，格式：YYYYMMDDHHMM  例：201203100300 表示 2012 年 3 月 10 日 3 时 0 分
                                "destinationTerminal": "",
                                "duration": 230,//飞行时长，单位为分钟，通过时差转换后的结果
                                "flightNumber": "CX347",//航班号，如：CA123。航班号数字前若有多余的数字 0，必须去掉，如 CZ006 需返回 CZ6
                                "maxSeat": "9",//可预订的座位数，最大为 9 (注：如为多段行程，只取最小值)
                                "originTerminal": "",//出发航站楼
                                "stopCities": ""//经停地，/分隔城市三字码
                            }
                        ],
                        "ticketInvoiceType": 1//报销凭证类型：0行程单/1旅行发票,如果该字段没有，或者为空，默认为行程单类型
                    },
                    {
                        "adultPrice": 6010,//成人单价（以元为单位）
                        "adultTax": 188,//成人税费（以元为单位）
                        "adultTaxType": 0,//成人税费类型：0 未含税 / 1 已含税
                        "applyType": 0,//报价类型：0 预定价 / 1 申请价
                        "childPrice": 6011,//儿童单价（以元为单位）
                        "childTax": 188,//儿童税费（以元为单位）
                        "childTaxType": 0,//儿童税费类型：0 未含税 / 1 已含税
                        "tripType": 1,//是否是直飞航班；-1：转机航班，0：全部航班，1：直飞航班；默认为0
                        "averagePriceTax":6014,//（均价含税，熊进超加）价格为单人票价格，如果成人>0并且儿童>0，价格显示为均价，计算方法：(成人含税总价+儿童含税总价)/(成人人数+儿童人数)；
                        "averageTax":188,//（均价税，熊进超加）计算方法：(成人税总价+儿童税总价)/(成人人数+儿童人数)；
                        "data": "H8KLCAAAAAAAAABdwo87C8OCQBDChMO/SmDDmzvDnUduc8KXNMOGw7jCghQRJMKQNFrCqsKNNsO6w7/DnQhCEGbCh8OZwo9pwqZew7fCp8OLw47ChwRMwqzCkmNAwoLDo8K2w7XCh3bDr8OswrzDpcKqGVwzwphLXljCkMKEFSPCqUfDsUQZYcKJwpPClnMmZcKYwpjDuzHDgQzDk1/Djxhxw4kTwqtGN8KCIsORAsOPFMKjw7nDvMKBwqDCnMKUcxRmwqLCglIAwoTDm8O7w756PsKuUH8HwqwGw5INw5gCwo4pFkHCoXPDnQfDhcOUIMK1w5sAAAA=_U0hJSklFOTk=_MTM=_NzgxODU=",
                        "fromSegments": [//去程
                            {
                                "aircraftCode": "333",//机型
                                "arrAirport": "HKG",//到达机场 IATA 三字码
                                "arrAirportName": "香港机场",//到达机场（熊进超加）
                                "arrCityName": "香港",//到达城市（熊进超加）
                                "arrTime": "201603111353",//到达日期时间，格式：YYYYMMDDHHMM  例：201203101305 表示 2012年3月10日13时5分
                                "cabin": "Y",//舱位 玖玖机票中未指出Y的含义，应该还有其他值
                                "cabinCount": "9",//舱位个数
                                "carrier": "CX",//航司 IATA 二字码，必须与 flightNumber 航司相同，可以用来获取航空公司的LOGO
                                "carrierName": "吉祥航空公司",//航司中文名（熊进超加）
                                "codeShare": false,//代码共享标识（true 代码共享/false 非代码共享）
                                "depAirport": "PEK",//出发机场 IATA 三字码
                                "depAirportName": "北京首都国际机场",//出发机场（熊进超加）
                                "depCityName": "北京",//出发城市（熊进超加）
                                "depTime": "201603111000",//起飞日期时间，格式：YYYYMMDDHHMM  例：201203100300 表示 2012 年 3 月 10 日 3 时 0 分
                                "destinationTerminal": "",
                                "duration": 230,//飞行时长，单位为分钟，通过时差转换后的结果
                                "flightNumber": "CX347",//航班号，如：CA123。航班号数字前若有多余的数字 0，必须去掉，如 CZ006 需返回 CZ6
                                "maxSeat": "9",//可预订的座位数，最大为 9 (注：如为多段行程，只取最小值)
                                "originTerminal": "",//出发航站楼
                                "stopCities": ""//经停地，/分隔城市三字码
                            }
                        ],
                        "ticketInvoiceType": 1//报销凭证类型：0行程单/1旅行发票,如果该字段没有，或者为空，默认为行程单类型
                    }
                ]
            }
        };

        //快速排序
        var quickSort = function(list,params) {
            if (list.length <= 1) { return list; }
            var pivot = list.splice(Math.floor(list.length / 2), 1)[0];
            var middle = params[0] != 'averagePriceTax' && params[0] != 'averagePrice'?pivot.fromSegments[0][params[0]]:pivot[params[0]];
            var left = [];
            var right = [];
            var value = '';

            for (var i = 0; i < list.length; i++) {
                value = params[0] != 'averagePriceTax' && params[0] != 'averagePrice'?list[i].fromSegments[0][params[0]]:list[i][params[0]];
                if(params[1] == 'asc') {
                    if (value < middle) {
                        left.push(list[i]);
                    } else {
                        right.push(list[i]);
                    }
                }else{
                    if (value > middle) {
                        left.push(list[i]);
                    } else {
                        right.push(list[i]);
                    }
                }
            }
            return quickSort(left,params).concat([pivot], quickSort(right,params));
        };

        //处理排序操作
        function formatFlight(params)
        {
            result = origin;
            if( params != sort)
            {
                //排序
                result.data.routings = quickSort(result.data.routings,params.split('.'));
                sort = params;
            }
            renderFlight();
        }

        //渲染数据
        function renderFlight()
        {
            console.log(result.data.routings);
        }

        //入口进行一次排序
        formatFlight('averagePriceTax.asc')
    });

    </script>
@endsection
