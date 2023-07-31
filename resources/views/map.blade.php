<script src="@mikha-dev.dcat-statistics"></script>
<div class="box Dcat_Admin_Widgets_Box" style="margin-top: 10px">
    <div class="box-header with-border">
        <h3 class="box-title">Visitors Regional Statistics</h3>
    </div>
    <div class="box-body collapse show">
        <div id="map" style="width: 100%;height:600px;"></div>
    </div>
</div>

<script>
    $(function () {
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('map'));

        var nameMap = {
            Afghanistan: "阿富汗",
            Albania: "阿尔巴尼亚",
            Algeria: "阿尔及利亚",
            Andorra: "安道尔",
            Angola: "安哥拉",
            Antarctica: "南极洲",
            "Antigua and Barbuda": "安提瓜和巴布达",
            Argentina: "阿根廷",
            Armenia: "亚美尼亚",
            Australia: "澳大利亚",
            Austria: "奥地利",
            Azerbaijan: "阿塞拜疆",
            "The Bahamas": "巴哈马",
            Bahrain: "巴林",
            Bangladesh: "孟加拉国",
            Barbados: "巴巴多斯",
            Belarus: "白俄罗斯",
            Belgium: "比利时",
            Belize: "伯利兹",
            Benin: "贝宁",
            Bermuda: "百慕大",
            Bhutan: "不丹",
            Bolivia: "玻利维亚",
            "Bosnia and Herz.": "波黑",
            Botswana: "博茨瓦纳",
            Brazil: "巴西",
            Brunei: "文莱",
            Bulgaria: "保加利亚",
            "Burkina Faso": "布基纳法索",
            Burundi: "布隆迪",
            Bahamas: "巴哈马国",
            Cambodia: "柬埔寨",
            Cameroon: "喀麦隆",
            Canada: "加拿大",
            "Cape Verde": "佛得角",
            "Central African Rep.": "中非共和国",
            Chad: "乍得",
            Chile: "智利",
            China: "中国",
            Colombia: "哥伦比亚",
            Comoros: "科摩罗",
            Congo: "刚果共和国",
            "Costa Rica": "哥斯达黎加",
            Croatia: "克罗地亚",
            Cuba: "古巴",
            Cyprus: "塞浦路斯",
            "Czech Rep.": "捷克共和国",
            "Côte d'Ivoire": "科特迪瓦",
            Denmark: "丹麦",
            Djibouti: "吉布提",
            "Dominican Rep.": "多米尼加",
            "Dominican Republic": "多明尼加共和国",
            Ecuador: "厄瓜多尔",
            Egypt: "埃及",
            "El Salvador": "萨尔瓦多",
            "Eq. Guinea": "赤道几内亚",
            Eritrea: "厄立特里亚",
            Estonia: "爱沙尼亚",
            Ethiopia: "埃塞俄比亚",
            "Falkland Islands": "福克兰群岛",
            "Faroe Islands": "法罗群岛",
            Fiji: "斐济",
            Finland: "芬兰",
            France: "法国",
            "French Guiana": "法属圭亚那",
            "French Southern and Antarctic Lands": "法属南半球和南极领地",
            Gabon: "加蓬",
            Gambia: "冈比亚",
            "Gaza Strip": "加沙",
            Georgia: "格鲁吉亚",
            Germany: "德国",
            Ghana: "加纳",
            Greece: "希腊",
            Greenland: "格陵兰",
            Grenada: "格林纳达",
            Guadeloupe: "瓜德罗普",
            Guatemala: "危地马拉",
            Guinea: "几内亚",
            "Guinea-Bissau": "几内亚比绍",
            Guyana: "圭亚那",
            Haiti: "海地",
            Honduras: "洪都拉斯",
            "Hong Kong": "香港",
            Hungary: "匈牙利",
            Iceland: "冰岛",
            India: "印度",
            Indonesia: "印尼",
            Iran: "伊朗",
            Iraq: "伊拉克",
            "Iraq-Saudi Arabia Neutral Zone": "伊拉克阿拉伯中立区",
            Ireland: "爱尔兰",
            "Isle of Man": "马恩岛",
            Israel: "以色列",
            Italy: "意大利",
            "Ivory Coast": "科特迪瓦",
            Jamaica: "牙买加",
            "Jan Mayen": "扬马延岛",
            Japan: "日本",
            Jordan: "约旦",
            Kazakhstan: "哈萨克斯坦",
            Kenya: "肯尼亚",
            Kerguelen: "凯尔盖朗群岛",
            Kiribati: "基里巴斯",
            "Dem. Rep. Korea": "朝鲜",
            "Korea": "韩国",
            Kuwait: "科威特",
            Kyrgyzstan: "吉尔吉斯斯坦",
            "Lao PDR": "老挝",
            Latvia: "拉脱维亚",
            Lebanon: "黎巴嫩",
            Lesotho: "莱索托",
            Liberia: "利比里亚",
            Libya: "利比亚",
            Liechtenstein: "列支敦士登",
            Lithuania: "立陶宛",
            Luxembourg: "卢森堡",
            Macau: "澳门",
            Macedonia: "马其顿",
            Madagascar: "马达加斯加",
            Malawi: "马拉维",
            Malaysia: "马来西亚",
            Maldives: "马尔代夫",
            Mali: "马里",
            Malta: "马耳他",
            Martinique: "马提尼克",
            Mauritania: "毛里塔尼亚",
            Mauritius: "毛里求斯",
            Mexico: "墨西哥",
            Moldova: "摩尔多瓦",
            Monaco: "摩纳哥",
            Mongolia: "蒙古",
            Morocco: "摩洛哥",
            Mozambique: "莫桑比克",
            Myanmar: "缅甸",
            Namibia: "纳米比亚",
            Nepal: "尼泊尔",
            Netherlands: "荷兰",
            "New Caledonia": "新喀里多尼亚",
            "New Zealand": "新西兰",
            Nicaragua: "尼加拉瓜",
            Niger: "尼日尔",
            Nigeria: "尼日利亚",
            "Northern Mariana Islands": "北马里亚纳群岛",
            Norway: "挪威",
            Oman: "阿曼",
            Pakistan: "巴基斯坦",
            Panama: "巴拿马",
            "Papua New Guinea": "巴布亚新几内亚",
            Paraguay: "巴拉圭",
            Peru: "秘鲁",
            Philippines: "菲律宾",
            Poland: "波兰",
            Portugal: "葡萄牙",
            "Puerto Rico": "波多黎各",
            Qatar: "卡塔尔",
            Reunion: "留尼旺岛",
            Romania: "罗马尼亚",
            Russia: "俄罗斯",
            Rwanda: "卢旺达",
            "San Marino": "圣马力诺",
            "Sao Tome and Principe": "圣多美和普林西比",
            "Saudi Arabia": "沙特阿拉伯",
            Senegal: "塞内加尔",
            Seychelles: "塞舌尔",
            "Sierra Leone": "塞拉利昂",
            Singapore: "新加坡",
            Slovakia: "斯洛伐克",
            Slovenia: "斯洛文尼亚",
            "Solomon Is.": "所罗门群岛",
            Somalia: "索马里",
            "South Africa": "南非",
            Spain: "西班牙",
            "Sri Lanka": "斯里兰卡",
            "St. Christopher-Nevis": "圣",
            "St. Lucia": "圣露西亚",
            "St. Vincent and the Grenadines": "圣文森特和格林纳丁斯",
            'Sudan': "苏丹",
            Suriname: "苏里南",
            Svalbard: "斯瓦尔巴特群岛",
            Swaziland: "斯威士兰",
            Sweden: "瑞典",
            Switzerland: "瑞士",
            Syria: "叙利亚",
            Taiwan: "台湾",
            Tajikistan: "塔吉克斯坦",
            Tanzania: "坦桑尼亚",
            Thailand: "泰国",
            Togo: "多哥",
            Tonga: "汤加",
            "Trinidad and Tobago": "特里尼达和多巴哥",
            Tunisia: "突尼斯",
            Turkey: "土耳其",
            Turkmenistan: "土库曼斯坦",
            "Turks and Caicos Islands": "特克斯和凯科斯群岛",
            "Timor-Leste": "东帝汶",
            Uganda: "乌干达",
            Ukraine: "乌克兰",
            "United Arab Emirates": "阿联酋",
            "United Kingdom": "英国",
            "United States": "美国",
            Uruguay: "乌拉圭",
            Uzbekistan: "乌兹别克斯坦",
            Vanuatu: "瓦努阿图",
            Venezuela: "委内瑞拉",
            Vietnam: "越南",
            "W. Sahara": "西撒哈拉",
            "Western Samoa": "西萨摩亚",
            Yemen: "也门",
            Yugoslavia: "南斯拉夫",
            "Dem. Rep. Congo": "刚果民主共和国",
            Zambia: "赞比亚",
            Zimbabwe: "津巴布韦",
            "S. Sudan": "南苏丹",
            Somaliland: "索马里兰",
            Montenegro: "黑山",
            Kosovo: "科索沃",
            Serbia: "塞尔维亚"
        };
        // 国家颜色映射
        var colorMapData = {!! json_encode($countries) !!};

        // 指定图表的配置项和数据
        let option = {
            backgroundColor: '#fff',//画布背景颜色
            visualMap: {
                max: 100,
                calculable: true,
                inRange: {
                    color: ['#F5F5F5', '#ffffbf', '#fee090', '#fdae61', '#f46d43', '#d73027', '#a50026']
                }
            },
            geo: {
                show: true,
                /*nameMap: nameMap, */
                map: 'world',
                label: {
                    normal: {
                        show: false
                    },
                    emphasis: {
                        show: false,
                    }
                },
                roam: false,
                itemStyle: {
                    normal: {
                        areaColor: '#F5F5F5',
                        borderColor: 'none',
                        borderWidth: 2,
                    },
                }
            },
            tooltip: {
                trigger: 'item',
                formatter: function (params) {
                    return params.name + ' : ' + (params.value ? params.value : 0);
                }
            },
            series: [
                {
                    type: 'map',
                    map: 'world',
                    geoIndex: 1,
                    /* nameMap: nameMap, */
                    data: colorMapData,
                    aspectScale: 0.75, //长宽比
                    showLegendSymbol: false, // 存在legend时显示
                    label: {
                        normal: {
                            show: false,
                        },
                        emphasis: {
                            show: false,
                            textStyle: {
                                color: '#fff'
                            }
                        }
                    },
                    roam: false,
                    itemStyle: {
                        normal: {
                            areaColor: '#F5F5F5',
                            borderColor: '#2580EB',
                        },
                        emphasis: {
                            areaColor: '#2580EB',
                            borderColor: '#2580EB',
                            borderWidth: 2,
                        }
                    },
                }]
        };


        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    })

</script>
