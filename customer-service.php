<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Home";

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php include(ROOT_PATH . "/includes/head.php");  ?>

    <link rel="stylesheet" href="css/customer.css">
</head>

<body>

    <?php include(ROOT_PATH . "/includes/header.php");  ?>

    <!-- main content -->

    <div class="top-background py-5 my-2">
        <div class="container-fluid  mt-5 py-4 p-sm-0 w-md-75">

            <div class="top-text py-5 px-2 mt-5 w-75 mx-auto">

                <div class="display-5 fw-500 text-center py-3 text-white">
                    Customer Service Center
                </div>
                <div class="text-white text-center w-75 mx-auto">
                We have 6 major trading algorithms and each owns its portfolio? Any queries Browse our customer service directory and receive answers to the most common questions or reach out to our consumer's support. 
                </div>
            </div>


        </div>

    </div>

    <div class="top-questions py-4">

        <div class="container py-5">
            <h2 class="h2 color-2 py-2 fw-bold">Top questions</h2>
        </div>

        <div class="questions">
            <div class="row w-75 mx-auto py-3">
                <div class="col-12 col-md-6 p-0">

                    <!-- question 1 -->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                    aria-expanded="true" aria-controls="collapse1">
                                    <i class="fa fa-angle-down"></i> What's United Capital? 
                                </button>
                            </p>
                            <div class="collapse" id="collapse1">
                                <div class="card card-body border-0 text-dark text-secondary">

                                United capital finance is a global alternative investment management firm and was founded in 2010, we offer and operate with long-term and short-term approaches to investing, we focused on diversification, uncorrelated alpha strategists, investment advice and solutions, analyzing financial information to produce forecasts of business, industry, and economic conditions to make informed investment decisions, Interpreting data affecting investment programs, such as price, yield, stability, future trends in investment risks, and economic influences. 


                                United hive, quickly made us one of the industry leaders. Our team of trading and valid professionals with extensive knowledge of the market specializes in building the most efficient and reliable portfolio for you. United capital is also the founding partner of Abra, Abra offers easy on-ramps (ACH wire, credit card, etc) to change your fiat into crypto safely, securely, and confidently. Our service was founded at the end of 2010 and with now over 200.000 users now. We're one of the world's leading industries in financial services. 
                                Our objective Is also based on this firm's discretionary global macro strategies to produce a high risk-adjusted return over the long term by using a disciplined, repeatable investment process within a strong risk management framework.
                                United we believe in integrity, transparency, and alignment of interest are essential, uncompromising parts of your busses model.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- question 2 -->

                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                    aria-expanded="true" aria-controls="collapse2">
                                    <i class="fa fa-angle-down"></i> HOW DOES INVESTING WORK WITH UNITED CAPITAL? 
                                </button>
                            </p>
                            <div class="collapse" id="collapse2">
                                <div class="card card-body border-0 text-dark text-secondary">


                                It’s quick and very easy! As soon as we receive your payment your contract will begin and will be added to your profile, and you will immediately start profiting. Depending on the portfolio algorithm you select and the associated service agreement you're into, The first investment output is released after 48 hours, and then a daily output will follow for monthly withdrawals.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- question 3 -->

                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                                    aria-expanded="true" aria-controls="collapse3">
                                    <i class="fa fa-angle-down"></i>
                                    WHAT DOES “100% UPTIME GUARANTEE MEANS? 
                                </button>
                            </p>
                            <div class="collapse" id="collapse3">
                                <div class="card card-body border-0 text-dark text-secondary">

                                It is always possible that We undergo crashes, slows down or completely breaks, In all these cases, our algorithms and insured partners ensure that funds are allocated to the relevant personals to fully compensate for possible fund loss from our locked up funds. This way our clients will not lose a second of time in receiving their returns and recoveries.

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- question 4-->

                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                    aria-expanded="true" aria-controls="collapse4">
                                    <i class="fa fa-angle-down"></i>

                                    WHERE IS OUR TRADING OFFICES LOCATED? 

                                </button>
                            </p>
                            <div class="collapse" id="collapse4">
                                <div class="card card-body border-0 text-dark text-secondary">
                                For security reasons, we do not disclose the exact location of our trading offices. As of April 2011, we are operating several trading offices that are located in United States and United Kingdom.but not the only criteria. See our Support service for more information.
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- question 5-->

                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                    aria-expanded="true" aria-controls="collapse5">
                                    <i class="fa fa-angle-down"></i>

                                    WHAT PORTFOLIO CAN I INVESTING IN, IN EACH ALGORITHIM?

                                </button>
                            </p>
                            <div class="collapse" id="collapse5">
                                <div class="card card-body border-0 text-dark text-secondary">
                                 

                                You are able to Invest in stocks and other various portfolio being listed directly via our mining allocation page*

                                The availability of Portfolio you can invest in depends on the contract you have chosen,You must allocate your Chioces in order to determine the receiving for your investing output. If no allocation has been made, the Investment output will default to the following for the given portfolio algorithm: CONTRACT - Stocks - Crypocurrencies - Nfts - Retirement plan - 529 students & children plan - Initial Recovery. 

                                United capital Advanced Allocation” (special feature): It allows you to get investment outputs and returns in many different portfolios even if they are not invested directly in the same algorithm. For example, you can get your investment returns in stocks while also investing in an Nft / retirement algorithm!. which is then automatically swapped into your portfolio choice by our algorithmic framework. 
                                The Allocation function is designed for customers to receive delivery of their Investing results in their preferred option. We call it “investing in a smarter way”. The same technique is also used to get high Rois in a long run. 
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- question 6-->

                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse6"
                                    aria-expanded="true" aria-controls="collapse6">
                                    <i class="fa fa-angle-down"></i>

                                    HOW CAN I INVEST IN DIFFERENT PORTFOLIO AT THE SAME TIME? 

                                </button>
                            </p>
                            <div class="collapse" id="collapse6">
                                <div class="card card-body border-0 text-dark text-secondary">
                                

United capital allows its clients to invest in different types of our 6+ major portfolio types at the same time. You decide which Potfolio you prefer and you can allocate your returns accordingly, you can visit the above Faq for more info. Or visit your customers support. 
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- question 7-->

                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse7"
                                    aria-expanded="true" aria-controls="collapse7">
                                    <i class="fa fa-angle-down"></i>

                                    WHAT’RE THE EXPECTED RETURNS? 

                                </button>
                            </p>
                            <div class="collapse" id="collapse7">
                                <div class="card card-body border-0 text-dark text-secondary">

                                

                                Since Our third-party calculators is a popular way of estimating your Roi performance,

                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- question 8-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse8"
                                    aria-expanded="true" aria-controls="collapse8">
                                    <i class="fa fa-angle-down"></i>

                                    WHAT IS THE MAINTENANCE FEE?

                                </button>
                            </p>
                            <div class="collapse" id="collapse8">
                                <div class="card card-body border-0 text-dark text-secondary">

                                Some of our products have a maintenance fee attached. The maintenance fee covers all costs related to the investment, The fee is fixed but deducted from your rewards. You will find the maintenance fee details of your chosen contract in the Terms of Service before the account purchase.    



                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- question 9-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse9"
                                    aria-expanded="true" aria-controls="collapse9">
                                    <i class="fa fa-angle-down"></i>

                                    OK, FINE! HOW CAN I PAY?

                                </button>
                            </p>
                            <div class="collapse" id="collapse9">
                                <div class="card card-body border-0 text-dark text-secondary">


                                    We currently accept the following payment methods: Etherum, USDT e.t.c how do I purchase them, your can download our partnering members app on app store or play store (Abra) Abra they offers easy on-ramps (ACH wire, credit card, etc) to change your fiat into crypto safely, securely, and confidently.

                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- question 10-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse10"
                                    aria-expanded="true" aria-controls="collapse10">
                                    <i class="fa fa-angle-down"></i>

                                    HOW FREQUENTLY WILL I RECEIVE MY INVESTMENT OUTPUTS OR RETURN? 

                                </button>
                            </p>
                            <div class="collapse" id="collapse10">
                                <div class="card card-body border-0 text-dark text-secondary">
                                

                                    Investment outputs are generated daily, but you will receive your outputs only Monthly based on your portfolio contract and sometimes once you have accumulated to a certain amount. On portfolios with maintenance fee, minimum outputs are set in order to avoid that customers pay excessive fees for receiving small amounts in their accounts.
                                
                                </div>
                            </div>
                        </div>
                    </div>












                </div>

                <div class="col-12 col-md-6 p-0">

                    <!-- question 11-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse11"
                                    aria-expanded="true" aria-controls="collapse11">
                                    <i class="fa fa-angle-down"></i>

                                    What is your minimum investment amount for new clients?

                                </button>
                            </p>
                            <div class="collapse" id="collapse11">
                                <div class="card card-body border-0 text-dark text-secondary">

                                Regardless of your portfolio choice - we have to know what you want in order to work with you! 
                                
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- question 12-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse12"
                                    aria-expanded="true" aria-controls="collapse12">
                                    <i class="fa fa-angle-down"></i>

                                    Do you offer referral bonuses?

                                </button>
                            </p>
                            <div class="collapse" id="collapse12">
                                <div class="card card-body border-0 text-dark text-secondary">

                                

                                Yes we do, on all our 6 major portfolio category
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- question 13-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse13"
                                    aria-expanded="true" aria-controls="collapse13">
                                    <i class="fa fa-angle-down"></i>

                                    Is united capital regulated?

                                </button>
                            </p>
                            <div class="collapse" id="collapse13">
                                <div class="card card-body border-0 text-dark text-secondary">
                                

Yes We're regulated by Finra & sec and the Us & united kingdom government 

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- question 14-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse14"
                                    aria-expanded="true" aria-controls="collapse14">
                                    <i class="fa fa-angle-down"></i>
                                    HOW CAN I REACH YOU IF I HAVE FURTHER QUESTIONS? 

                                </button>
                            </p>
                            <div class="collapse" id="collapse14">
                                <div class="card card-body border-0 text-dark text-secondary">

                                

Customer service is our highest priority! Making decisions is not only about having a good feeling but also about understanding the business concept in detail. Therefore, if you need any help, our agents are always available to assist you. Feel free to contact us anytime via ticket from the “Customer Support Service” We are looking forward to hearing from you.

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- question 14-->
                    <div class="col-12 mt-4 faq">
                        <div class="w-lg-exp mx-auto">
                            <p>
                                <button
                                    class="w-100 btn color-2 fw-500 btn-transparent faq-text text-secondary text-start"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse14"
                                    aria-expanded="true" aria-controls="collapse14">
                                    <i class="fa fa-angle-down"></i>
                                    
                                Why do we accept cryptocurrencies as payment?

                                </button>
                            </p>
                            <div class="collapse" id="collapse14">
                                <div class="card card-body border-0 text-dark text-secondary">
 

This is Because Our webpage is built on the web 3.0  block chain.
                                </div>
                            </div>
                        </div>
                    </div>



                    
                </div>

            </div>
        </div>
    </div>


    </div>


    <?php include(ROOT_PATH . "/includes/footer.php");  ?>

</body>

</html>