<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/gutenberg-css@0.6">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
   <style>
        table {
            border: 1px solid #005182;
            text-align: center;
            font-size: 13px;
        }
        .logoIMG{
          width: 100px;
        }
        .headerss{
          border: 1px solid;
          background-color: #005182;
          color: white;
          
        }
        .profilePic{
          width: 100PX;
          border-radius: 100px;
          text-align: center;
          margin-top: 20px;
          border: 4px solid #005182;
        }
        .profilePicmain{
          text-align: right;
        }
        td{
          border: 1px solid #005182;
        }
        .qrcode{
          height: 150px;
        }
        footer {
            text-align: center;
            font-style: italic;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
        *{
          font-family: 'Poppins', sans-serif;
        }
       
        .content-rules{
          font-size: 12px;
        }
    </style>
</head>
<body>
    
    <div class="logo">
    <img class="logoIMG" src="assets/img/logoText.png">
    </div>
    
    <h2 class="text-center"> <b>REGISTRATION FORM</b> </h2>
    
   
    
    <table class="table">
        <thead>
          <tr class="headerss">
            <th scope="col">Student ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
          </tr>
        </thead>    
        <tbody>
          <tr>
            <td scope="row" class="empIDS">{{ studID }}</td>
            <td>{{ firstname }}</td>
            <td>{{ middlename }}</td>
            <td>{{ lastname }}</td>
          </tr>
          <tr class="headerss">
            <th>Penalty</th>
            <th>Borrow Count</th>
            <th>Department</th>
            <th>Section</th>
          </tr>
          <tr>
            <td scope="row">{{ penalty }}</td>
            <td>{{ borrowcount }}</td>
            <td>{{ department }}</td>
            <td>{{ section }}</td>
          </tr>
          <tr class="headerss">
            <th>Street</th>
            <th>Barangay</th>
            <th>Municiplaity</th>
            <th>Province</th>
          </tr>
          <tr>
            <td scope="row">{{ street }}</td>
            <td>{{ barangay }}</td>
            <td>{{ municipality }}</td>
            <td>{{ province }}</td>
          </tr>
          <tr class="headerss">
            <th>Library ID</th>
            <th>Contact Number</th>
            <th>Username</th>
            <th>Password</th>
          
          </tr>
          <tr>
            <td scope="row">{{ libid }}</td>
            <td>{{ contact }}</td>
            <td>{{ username }}</td>
            <td>{{ password }}</td>
     
          </tr>
          <tr class="headerss">
            <th colspan="4">QR Code</th>
            
          </tr>
          <tr>
            <td scope="row" colspan="4" class="qrcode"><img class="qrcode" src="{{ qrcode }}"></td>
          
          </tr>
          
        </tbody>
      </table>

      <div class="row content-rules">
                <div class="col-lg-12">

                    

                    <div class="card">
                        <div class="card-body">
                            <h5 class="title" style="font-size: 13px;"> <b>Business Rules</b> </h5>
                            <p style="text-align: justify;"> The NU Baliwag Library App’s business
                                rules are quite broad, but we attempted to summarize them in order to fit them into our
                                documentation. There are rules in the library that address only library usage, and there
                                are also rules or policies that address borrowing books from the library. <br> <br>
                                <b> Here are some of the rules within the library system:</b>


                                <ol style="text-align: justify;">
                                    <li>Any violation against the following rules and regulations will be punishable per
                                        NU Baliwag.
                                        <ul>
                                            <li>It is a serious offense for a patron to cause a disturbance that causes
                                                damage to or destruction of library property.</li>
                                            <li>Library patrons are not permitted to use the identification of other
                                                patrons to gain access to the library.</li>
                                            <li>Students are expected to always keep the library quiet.</li>
                                            <li>Vandalism (writing on books and other library facilities, defacing
                                                library furniture, mutilating or tearing off pages of books, and
                                                removing security tags), theft, and unauthorized use of any library
                                                material or property not intended for public use are all serious
                                                offenses that will result in disciplinary action.</li>
                                            <li>It is prohibited to eat (including chewing gum), drink, sleep, smoke,
                                                deface library furniture, write on the walls and tables, or engage in
                                                any other form of misbehavior.</li>
                                            <li>Illegal internet activities using library wireless connection are
                                                strictly prohibited (e.g., games, viewing obscene materials, etc.)</li>
                                        </ul>
                                    </li>
                                    <li>Bags and valuables will be kept in a separate location (bag counter).</li>
                                    <li>There will be no seating reservations in the library.</li>
                                </ol>
                            </p>
                        </div>
                    </div>

                    

                </div>

            </div>
    
    <footer>
        InFuse Technologies &copy; 2023
    </footer>
    
</body>
</html>