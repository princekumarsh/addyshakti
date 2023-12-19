@extends('layouts.front-end.app')
<style>
    .bora{
        border-radius:60px;
    }
    .b2bcard {
    border: 1px solid rgba(60, 60, 60, .54);
    border-radius: 10px;
    padding: 22px;
    margin: 22px 0;
    }
    .p-10{
        padding: 1px 10px;
    }
    .mw-80{
        max-width:80px !important;
    }
    .minw{
        min-width:95px !important;
    }
    .bg-blue{
        background:#2160B4;
    }
    .fs-20-b{
        font-size: 20px;
        color: #000000;
    }
    .fs-20-w{
        font-size: 20px;
        color: #fff;
    }
    .txt-w{
        color:white;
    }
    .pt-3{
        padding-top:3px;
    }
</style>
@section('content')

    <div class="container">
        <div class="row p-10">
            <div class="b2bcard col-12 bg-blue txt-w">
                <div class="row">
                    <div class="col-12 text-center fs-20-w">
                        <strong>Coupon details</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">
                        <strong>Name :</strong>
                    </div>
                    <div class="col-6">
                        <strong>DG automobiles</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">
                        <strong>Category :</strong>
                    </div>
                    <div class="col-6">
                        <strong>automobiles</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">
                        <strong>Sub-category :</strong>
                    </div>
                    <div class="col-6">
                        <strong>Periodic Service Free ( Spare charge Will be extra)</strong>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-6">
                        <strong>Expiry date :</strong>
                    </div>
                    <div class="col-6">
                        <strong>20-04-2023</strong>
                    </div>
                </div>
                <table class="table txt-w">
                    <tbody>
                        <tr class="clistdata">
                            <td style="font-weight: 500">Total Item</td>
                            <td><span>3</span></td>
                        </tr>

                        <tr class="clistdata">
                            <td style="font-weight: 500">Subtotal
                            </td>
                            <td>₹<span>999.00</span></td>
                        </tr>
                        <tr class="clistdata">
                            <td style="font-weight: 600">Total</td>
                            <td class="text-warning" style="font-weight:500">
                                ₹<span>999.00</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row p-10">
            <div class="b2bcard col-12">
                <div class="row">
                    <div class="col-12 text-center fs-20-b">
                        <strong>User details</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>Name :</strong>
                    </div>
                    <div class="col-8">
                        <strong>Prince Kumar</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>Email :</strong>
                    </div>
                    <div class="col-8">
                        <strong>princekumrsh@gmail.com</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>Mob no. :</strong>
                    </div>
                    <div class="col-8">
                        <strong>8210600193</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>Vehicle no. :</strong>
                    </div>
                    <div class="col-8">
                        <strong>BR 01 XX 1111</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>Make & model :</strong>
                    </div>
                    <div class="col-8">
                        <strong>model</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>Insurance renewal date :</strong>
                    </div>
                    <div class="col-8">
                        <strong>2023-08-19</strong>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-4">
                        <strong>date of issue :</strong>
                    </div>
                    <div class="col-8">
                        <strong>26 jul 2023</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
