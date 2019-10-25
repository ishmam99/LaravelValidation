<!DOCTYPE html>
<html>
<head>

<style>
  .body{
    background-color: aqua;
  }
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: aqua;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}


</style>
</head>
<body>


<div class="card">
<img src="{{$profile['image']}}" alt="John" style="width:100%">
  <h1>{{$profile['name']}}</h1>
  <p class="title">{{$profile['profession']}}</p>
 
  <div style="margin: 24px 0;">
    <h3>Name : {{$profile['name']}}</h3>
    <h3>Email : {{$profile['email']}}</h3>
    <h3>Profession : {{$profile['profession']}}</h3>
    <h3>Salary : {{$profile['salary']}}</h3>
    <h3>Birth Date : {{$profile['birth_date']}}</h3>
  </div>
 
</div>

</body>
</html>
