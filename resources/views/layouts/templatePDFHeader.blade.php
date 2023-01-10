<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<style>
    html,
    body {
        margin: 8px;
        padding: 8px;
        border: 8px;
        vertical-align: baseline;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11px;
        line-height: 1.2;
    }

    .page-break {
        page-break-after: always;
    }

    footer .pagenum:before {
        content: counter(page);
    }

    @page {
        margin: 100px 25px;
    }

    .header {
        position: fixed;
        top: -5px;
        bottom: 200px;
        left: 0px;
        right: 0px;
    }

    .footer {
        position: fixed;
        left: 0px;
        right: 0px;
        bottom: 50px;
    }

    h2 {
        margin-block-end: 0.1em;
    }

    ul {
        list-style-type: none;
    }

    li {
        list-style-type: none;
    }

    table {
        width: 100%;
    }

    td,
    th {
        vertical-align: top;
        text-align: left
    }

    a {
        color: black;
    }

    hr {
        border: 0.1pt solid dimgray;
    }

    a:link {
        text-decoration: none;
    }

    .table-produto {
        font-size: 11px;
        line-height: 1.2;
    }

    .logo {
        padding-right: 5px;
    }

    .border-bottom {
        border-bottom: 1px solid black;
    }

    .table-linhas tr:nth-child(even) {
        background: #EEE;
    }

    .table-linhas tr:nth-child(odd) {
        background: #FFF;
    }

    .table-linhas tr th {
        background: #EEE;
    }

    .valor {
        text-align: right;
    }
</style>