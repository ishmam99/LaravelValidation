<!DOCTYshowE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Show Name</b></td>
        <td><b>Email</b></td>
        <td><b>Salary </b></td>    
        <td><b>Birthdate </b></td>  
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$show->name}}
        </td>
        <td>
          {{$show->email}}
        </td>
        <td>
          {{$show->salary}}
        </td>
        <td>
          {{$show->birth_date}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>