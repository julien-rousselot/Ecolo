const dropdown = document.querySelectorAll(".dropdown");
const dropcontent = document.querySelectorAll(".dropdown-content");

for (let count = 0; count < dropcontent.length; count++){
    dropdown[count].addEventListener('mouseover', function(event){
        if  (dropcontent[count].style.display === 'none'){
            dropcontent[count].style.display = 'grid';
        } 
        else { dropcontent[count].style.display = 'none';
    }
});
}