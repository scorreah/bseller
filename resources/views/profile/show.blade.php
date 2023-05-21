@extends('layouts.app')

<div class="infoProfile">
    <div class="containerr">
        <div class="nameBox">
            <h2>
                Name:
            </h2>
            <div class="boxxx">
                <div class="boxx">
                    {{$viewData['name']}}
                </div>
            </div>
        </div>
        <div class="emailBox">
            <h2>
                Email:
            </h2>
            <div class="boxxx">
                <div class="boxx">
                    {{$viewData['email']}}
                </div>
            </div>
        </div>
        <div class="balanceBox">
            <h2>
                Balance:
            </h2>
            <div class="boxx">
                {{$viewData['balance']}}
            </div>
        </div>
    </div>
    

</div>