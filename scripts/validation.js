const ext = (s)=> {
    return document.getElementById(s).value.toString();
}

const email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,})+$/;
const password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
const alphabet_regex = /^[A-Za-z ]+$/;

const validation = (e) => {

    let validation_flag = true;

    const fname = ext("fname");
    const lname = ext("lname");
    const email = ext("email");
    const pass = ext("pass");
    const cpass = ext("cpass");

    if(!email.match(email_regex))
    {
      alert("Enter valid email");
      validation_flag = false;
    }
    if(!fname.match(alphabet_regex))
    {
      alert("Enter valid name");
      validation_flag = false;
    }
    if(!lname.match(alphabet_regex))
    {
      alert("Enter valid name");
      validation_flag = false;
    }
    if(pass == "" || !pass.match(password_regex))
    {
      alert("enter valid password with atleast one upper case, one lower case and one numeric character");
      validation_flag = false;
    }
    if (pass !== cpass)
    {
      alert("password and confirm password not matching");
      validation_flag = false;
    }

    if(validation_flag){
      document.getElementById("form").submit();
    }

}