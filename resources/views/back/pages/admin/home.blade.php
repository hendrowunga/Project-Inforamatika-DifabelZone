@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@section('content')
    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row align-items-center">
            <div class="col-md-4" style="padding-right: 50px;">
                <img src="{{ Auth::user()->picture }}" alt="User Picture"
                    style="width: 50%; height: auto; object-fit: cover; border-radius: 30px;" />
            </div>

            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back
                    <div class="weight-600 font-30 text-blue"><span class="user-name">{{ Auth::user()->name }}</span></div>
                </h4>
                <p class="font-18 max-width-600">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde
                    hic non repellendus debitis iure, doloremque assumenda. Autem
                    modi, corrupti, nobis ea iure fugiat, veniam non quaerat
                    mollitia animi error corporis.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div id="chart" style="min-height: 102.7px;">
                            <div id="apexcharts1cd207" class="apexcharts-canvas apexcharts1cd207 apexcharts-theme-light"
                                style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1488" width="70"
                                    height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG1490" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-15, 0)">
                                        <defs id="SvgjsDefs1489">
                                            <clipPath id="gridRectMask1cd207">
                                                <rect id="SvgjsRect1491" width="106" height="102" x="-3" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMask1cd207">
                                                <rect id="SvgjsRect1492" width="102" height="102" x="-1" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1498">
                                                <stop id="SvgjsStop1499" stop-opacity="1" stop-color="rgba(242,242,242,1)"
                                                    offset="0"></stop>
                                                <stop id="SvgjsStop1500" stop-opacity="1" stop-color="rgba(27,0,255,1)"
                                                    offset="1"></stop>
                                                <stop id="SvgjsStop1501" stop-opacity="1" stop-color="rgba(27,0,255,1)"
                                                    offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="SvgjsLinearGradient1508">
                                                <stop id="SvgjsStop1509" stop-opacity="1" stop-color="rgba(236,240,244,1)"
                                                    offset="0"></stop>
                                                <stop id="SvgjsStop1510" stop-opacity="1" stop-color="rgba(27,0,255,1)"
                                                    offset="1"></stop>
                                                <stop id="SvgjsStop1511" stop-opacity="1" stop-color="rgba(27,0,255,1)"
                                                    offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g id="SvgjsG1494" class="apexcharts-radialbar">
                                            <g id="SvgjsG1495">
                                                <g id="SvgjsG1496" class="apexcharts-tracks">
                                                    <g id="SvgjsG1497" class="apexcharts-radialbar-track apexcharts-track"
                                                        rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"
                                                            fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)"
                                                            stroke-opacity="1" stroke-linecap="butt"
                                                            stroke-width="5.524268292682928" stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1503">
                                                    <g id="SvgjsG1507" class="apexcharts-series apexcharts-radial-series"
                                                        seriesName="seriesx1" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1512"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 40.965021414464175"
                                                            fill="none" fill-opacity="0.85"
                                                            stroke="url(#SvgjsLinearGradient1508)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.695121951219512"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                            data:angle="288" data:value="80" index="0" j="0"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 40.965021414464175">
                                                        </path>
                                                    </g>
                                                    <circle id="SvgjsCircle1504" r="21.47567073170732" cx="50"
                                                        cy="50" class="apexcharts-radialbar-hollow"
                                                        fill="transparent"></circle>
                                                    <g id="SvgjsG1505" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)" style="opacity: 1;"><text
                                                            id="SvgjsText1506" font-family="Helvetica, Arial, sans-serif"
                                                            x="50" y="55" text-anchor="middle" dominant-baseline="auto"
                                                            font-size="15px" font-weight="400" fill="#333333"
                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                            style="font-family: Helvetica, Arial, sans-serif;">80%</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1513" x1="0" y1="0" x2="100"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1514" x1="0" y1="0" x2="100"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 81px; height: 104px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">2020</div>
                        <div class="weight-600 font-14">Contact</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div id="chart2" style="min-height: 102.7px;">
                            <div id="apexcharts1cd21f" class="apexcharts-canvas apexcharts1cd21f apexcharts-theme-light"
                                style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1515" width="70"
                                    height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG1517" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-15, 0)">
                                        <defs id="SvgjsDefs1516">
                                            <clipPath id="gridRectMask1cd21f">
                                                <rect id="SvgjsRect1518" width="106" height="102" x="-3" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMask1cd21f">
                                                <rect id="SvgjsRect1519" width="102" height="102" x="-1" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1525">
                                                <stop id="SvgjsStop1526" stop-opacity="1"
                                                    stop-color="rgba(242,242,242,1)" offset="0"></stop>
                                                <stop id="SvgjsStop1527" stop-opacity="1" stop-color="rgba(0,150,136,1)"
                                                    offset="1"></stop>
                                                <stop id="SvgjsStop1528" stop-opacity="1" stop-color="rgba(0,150,136,1)"
                                                    offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="SvgjsLinearGradient1535">
                                                <stop id="SvgjsStop1536" stop-opacity="1"
                                                    stop-color="rgba(236,240,244,1)" offset="0"></stop>
                                                <stop id="SvgjsStop1537" stop-opacity="1" stop-color="rgba(0,150,136,1)"
                                                    offset="1"></stop>
                                                <stop id="SvgjsStop1538" stop-opacity="1" stop-color="rgba(0,150,136,1)"
                                                    offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g id="SvgjsG1521" class="apexcharts-radialbar">
                                            <g id="SvgjsG1522">
                                                <g id="SvgjsG1523" class="apexcharts-tracks">
                                                    <g id="SvgjsG1524" class="apexcharts-radialbar-track apexcharts-track"
                                                        rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(242,242,242,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.524268292682928"
                                                            stroke-dasharray="0" class="apexcharts-radialbar-area"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1530">
                                                    <g id="SvgjsG1534" class="apexcharts-series apexcharts-radial-series"
                                                        seriesName="seriesx1" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1539"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 59.03497858553581"
                                                            fill="none" fill-opacity="0.85"
                                                            stroke="url(#SvgjsLinearGradient1535)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.695121951219512"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                            data:angle="252" data:value="70" index="0" j="0"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 22.193195148565476 59.03497858553581">
                                                        </path>
                                                    </g>
                                                    <circle id="SvgjsCircle1531" r="21.47567073170732" cx="50"
                                                        cy="50" class="apexcharts-radialbar-hollow"
                                                        fill="transparent"></circle>
                                                    <g id="SvgjsG1532" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)" style="opacity: 1;"><text
                                                            id="SvgjsText1533" font-family="Helvetica, Arial, sans-serif"
                                                            x="50" y="55" text-anchor="middle" dominant-baseline="auto"
                                                            font-size="15px" font-weight="400" fill="#333333"
                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                            style="font-family: Helvetica, Arial, sans-serif;">70%</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1540" x1="0" y1="0" x2="100"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1541" x1="0" y1="0" x2="100"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 81px; height: 104px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">400</div>
                        <div class="weight-600 font-14">Deals</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div id="chart3" style="min-height: 102.7px;">
                            <div id="apexcharts1cd22e" class="apexcharts-canvas apexcharts1cd22e apexcharts-theme-light"
                                style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1542" width="70"
                                    height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG1544" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-15, 0)">
                                        <defs id="SvgjsDefs1543">
                                            <clipPath id="gridRectMask1cd22e">
                                                <rect id="SvgjsRect1545" width="106" height="102" x="-3" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMask1cd22e">
                                                <rect id="SvgjsRect1546" width="102" height="102" x="-1" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1552">
                                                <stop id="SvgjsStop1553" stop-opacity="1"
                                                    stop-color="rgba(242,242,242,1)" offset="0"></stop>
                                                <stop id="SvgjsStop1554" stop-opacity="1"
                                                    stop-color="rgba(245,103,103,1)" offset="1"></stop>
                                                <stop id="SvgjsStop1555" stop-opacity="1"
                                                    stop-color="rgba(245,103,103,1)" offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="SvgjsLinearGradient1562">
                                                <stop id="SvgjsStop1563" stop-opacity="1"
                                                    stop-color="rgba(236,240,244,1)" offset="0"></stop>
                                                <stop id="SvgjsStop1564" stop-opacity="1"
                                                    stop-color="rgba(245,103,103,1)" offset="1"></stop>
                                                <stop id="SvgjsStop1565" stop-opacity="1"
                                                    stop-color="rgba(245,103,103,1)" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g id="SvgjsG1548" class="apexcharts-radialbar">
                                            <g id="SvgjsG1549">
                                                <g id="SvgjsG1550" class="apexcharts-tracks">
                                                    <g id="SvgjsG1551" class="apexcharts-radialbar-track apexcharts-track"
                                                        rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(242,242,242,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.524268292682928"
                                                            stroke-dasharray="0" class="apexcharts-radialbar-area"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1557">
                                                    <g id="SvgjsG1561" class="apexcharts-series apexcharts-radial-series"
                                                        seriesName="seriesx1" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1566"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 20.762195121951216 50.00000000000001"
                                                            fill="none" fill-opacity="0.85"
                                                            stroke="url(#SvgjsLinearGradient1562)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.695121951219512"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                            data:angle="270" data:value="75" index="0" j="0"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 20.762195121951216 50.00000000000001">
                                                        </path>
                                                    </g>
                                                    <circle id="SvgjsCircle1558" r="21.47567073170732" cx="50"
                                                        cy="50" class="apexcharts-radialbar-hollow"
                                                        fill="transparent"></circle>
                                                    <g id="SvgjsG1559" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)" style="opacity: 1;"><text
                                                            id="SvgjsText1560" font-family="Helvetica, Arial, sans-serif"
                                                            x="50" y="55" text-anchor="middle" dominant-baseline="auto"
                                                            font-size="15px" font-weight="400" fill="#333333"
                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                            style="font-family: Helvetica, Arial, sans-serif;">75%</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1567" x1="0" y1="0" x2="100"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1568" x1="0" y1="0" x2="100"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 81px; height: 104px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">350</div>
                        <div class="weight-600 font-14">Campaign</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card-box height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div id="chart4" style="min-height: 102.7px;">
                            <div id="apexcharts1cd23a" class="apexcharts-canvas apexcharts1cd23a apexcharts-theme-light"
                                style="width: 70px; height: 102.7px;"><svg id="SvgjsSvg1569" width="70"
                                    height="102.69999999999999" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG1571" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(-15, 0)">
                                        <defs id="SvgjsDefs1570">
                                            <clipPath id="gridRectMask1cd23a">
                                                <rect id="SvgjsRect1572" width="106" height="102" x="-3" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMask1cd23a">
                                                <rect id="SvgjsRect1573" width="102" height="102" x="-1" y="-1"
                                                    rx="0" ry="0" fill="#ffffff" opacity="1"
                                                    stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1579">
                                                <stop id="SvgjsStop1580" stop-opacity="1"
                                                    stop-color="rgba(242,242,242,1)" offset="0"></stop>
                                                <stop id="SvgjsStop1581" stop-opacity="1" stop-color="rgba(41,121,255,1)"
                                                    offset="1"></stop>
                                                <stop id="SvgjsStop1582" stop-opacity="1" stop-color="rgba(41,121,255,1)"
                                                    offset="1"></stop>
                                            </linearGradient>
                                            <linearGradient id="SvgjsLinearGradient1589">
                                                <stop id="SvgjsStop1590" stop-opacity="1"
                                                    stop-color="rgba(236,240,244,1)" offset="0"></stop>
                                                <stop id="SvgjsStop1591" stop-opacity="1" stop-color="rgba(41,121,255,1)"
                                                    offset="1"></stop>
                                                <stop id="SvgjsStop1592" stop-opacity="1" stop-color="rgba(41,121,255,1)"
                                                    offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <g id="SvgjsG1575" class="apexcharts-radialbar">
                                            <g id="SvgjsG1576">
                                                <g id="SvgjsG1577" class="apexcharts-tracks">
                                                    <g id="SvgjsG1578" class="apexcharts-radialbar-track apexcharts-track"
                                                        rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446"
                                                            fill="none" fill-opacity="1"
                                                            stroke="rgba(242,242,242,0.85)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.524268292682928"
                                                            stroke-dasharray="0" class="apexcharts-radialbar-area"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 49.99489704041412 20.762195567268446">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1584">
                                                    <g id="SvgjsG1588" class="apexcharts-series apexcharts-radial-series"
                                                        seriesName="seriesx1" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1593"
                                                            d="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 26.346118975439794 32.814449483278"
                                                            fill="none" fill-opacity="0.85"
                                                            stroke="url(#SvgjsLinearGradient1589)" stroke-opacity="1"
                                                            stroke-linecap="butt" stroke-width="5.695121951219512"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                            data:angle="306" data:value="85" index="0" j="0"
                                                            data:pathOrig="M 50 20.762195121951216 A 29.237804878048784 29.237804878048784 0 1 1 26.346118975439794 32.814449483278">
                                                        </path>
                                                    </g>
                                                    <circle id="SvgjsCircle1585" r="21.47567073170732" cx="50"
                                                        cy="50" class="apexcharts-radialbar-hollow"
                                                        fill="transparent"></circle>
                                                    <g id="SvgjsG1586" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)" style="opacity: 1;"><text
                                                            id="SvgjsText1587" font-family="Helvetica, Arial, sans-serif"
                                                            x="50" y="55" text-anchor="middle" dominant-baseline="auto"
                                                            font-size="15px" font-weight="400" fill="#333333"
                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                            style="font-family: Helvetica, Arial, sans-serif;">85%</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1594" x1="0" y1="0" x2="100"
                                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1595" x1="0" y1="0" x2="100"
                                            y2="0" stroke-dasharray="0" stroke-width="0"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 81px; height: 104px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">$6060</div>
                        <div class="weight-600 font-14">Worth</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
