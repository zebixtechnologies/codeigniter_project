<script>
        $(function () {
            $("#dtepickr").datepicker({
                changeMonth: true,
                changeYear: true
            });
            $("#autorimainder").validate();
        });
    </script>
     
    <style>

        .pageheading{
            margin-left:10px;
            text-align:center;
            min-height: 22px;
        }
        .pageheading h2{
            font-size:22px;
            font-weight:bold;
            color: #005CB3;
        }
        .sidebarlogos{
            opacity: 0.5;
            -webkit-opacity: 0.5;
            -ms-opacity: 0.5;
            -o-opacity: 0.5;
            -moz-opacity: 0.5;
            margin-bottom: 22px;


        }
        .pageheading h2 u{
            vertical-align: top;
        }
        .height{
            max-width: 59px !important;
        }
        .block img{
            opacity: 0.5;
            -webkit-opacity: 0.5;
            -ms-opacity: 0.5;
            -o-opacity: 0.5;
            -moz-opacity: 0.5;
        }
        #autorimainder{
            float:none;
        }
        #autorimainder .quote-list{
            width: 650px;
            padding: 0;
            margin: 0px auto;
        }
        #autorimainder .quote-list li{
            padding:5px 10px;
            font-size: 13px;
        }
        #autorimainder .quote-list li label{
            display: inline-block;
            vertical-align: middle;
        }
        #autorimainder input[type=text], input[type=password]{
            vertical-align: middle;
            display: inline-block;
            margin: 5px 0px;
            min-width: 180px;
            width: 180px;
        }
        #autorimainder select{
            margin-left:0px;
            min-width: 190px;
            width: 194px;
            height: 30px;
        }
        .reminder_btn{
            padding: 10px;
            text-align: center;
            display: block;
            background: #f2f2f2;
            border-top: 1px solid #ddd;
        }
        .reminder_btn input{
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            background: rgb(30, 114, 187);
            color: #fff;
            font-weight: bold;
            font-size: 14px;
        }
        .reminder_btn input:hover{
            background:rgb(0, 92, 179);
        }
        .block{
            display: block;
            margin:5px 0px;
        }
        .block img{
            width: 150px;
            display: inline-block;
            margin: 0px 20px;
        }
        .disclaimers {
            display: none;
        }

        #footer {
            background: #f3f5f6;
            margin-top: 50px;
        }

        .seals {
            text-align: left;
        }

        .landing-link {
            display: none;
        }
        p{
            display: block;
            text-align: center;
            padding: 0px 0px 6px 0px;
        }
        body{
           line-height: 17px !important;
            font-family: Lucida Grande, Lucida Sans, Lucida Sans Unicode, sans-serif !important;
        }
    </style>
<div class="container dotted-back">
    <div id="page-container">
        <div id="page-content">

            <div>
                <div id="main-form">
                    <div class="pageheading">
                        <h2>Set Up Auto Reminder Service</h2>
                    </div>
                    <p>The auto reminder service will send you an alert a day to your insurance expiry date via email and SMS. A Key Verticals representative will also reach out to you to assist with processing your insurance renewals with your chosen underwriter(s) for free.</p>
                    <form id='autorimainder' method="post"  action="<?= base_url() . 'autoreminder/reminder' ?>">
                        <ul class="quote-list requested-coverage-list clearfix">



                            <li class="odd">
                                <label for="name">YOUR NAME</label>                     
                                <input type="text" name="name" id="name" class="required" />
                            </li>
                            <li>
                                <label for="phone-input">YOUR PHONE NUMBER</label>
                                <input name="phone_number" id="phone_number" class="required number" type="text">
                            </li>
                            <li class="odd">
                                <label for="email-input">YOUR EMAIL</label>
                                <input id="email-input" name="email-input" class="required email" type="text">
                            </li>
                            <li>
                                <label for="currently-insured">CURRENTLY INSURED</label>
                                <select name="currently-insured" class="required">
                                    <option selected="selected" value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </li>
                            <li class="odd">
                                <label for="insurance-type">INSURANCE TYPE </label>
                                <span>
                                    <select id="insurance-type" name="insurance-type" class="small required">
                                        <option selected="selected" value="Third Party Only">Third Party Only</option>
                                        <option value="auto Insurance">Auto (Comprehensive)</option>
                                        <option value="health Insurance">Health Insurance</option>
                                        <option value="home Insurance">Home Insurance</option>
                                        <option value="life Insurance">Life Insurance</option>
                                        <option value="business Insurance">Business Insurance</option>
                                        <option value="travel Insurance">Travel Insurance</option>
                                    </select>
                                </span>
                            </li>
                            <li>
                                <label for="insurance-expiry-date">INSURANCE EXPIRY DATE</label>
                                <input type='text' class="required datepicker" id="dtepickr" name="insurance-expiry-date">
                            </li>
                            <div class="reminder_btn">
                                <input type="submit" value="Set Up Auto Reminder" >
                            </div>
                        </ul>
                    </form>
                </div>

                <div style="clear:both;">
                </div>
            </div>

        </div>

    </div>
</div>

