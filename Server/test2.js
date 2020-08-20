  
const email = document.querySelector("#email");
const btn = document.getElementById("add");


const id = document.querySelector("#id");
console.log(id.value);

firebase.database().ref('controls/' + 1).on('value', function(snapshot) {
    console.log(snapshot.val());   
    snapshot.forEach(function(childSnapshot) {
      var childData = childSnapshot.val();
      console.log("ChildData" + childData.light)
      id = snapshot.val();
    });
});

  firebase.database().ref('controls/'+1).set({
    light: "off",
    water: "off",
  }, function(error) {
    if (error) {
      // The write failed...
      console.log("Error");
    } else {
      // Data saved successfully!
      console.log("Success");
    }
  });


if(btn){
btn.addEventListener('click', (e) =>{
    e.preventDefault();
    console.log(email.value);
    firebase.database().ref('controls/2' ).set({
    email: email.value,
  
  }, function(error) {
    if (error) {
      console.log("Error");
    } else {
      // Data saved successfully!
          console.log("Success");
    }
  });
})
}

  
  
