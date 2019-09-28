function load() {
    // App Load Code
}

function gen() {
    api("scripts/backend/backhash/backhash.php","backhash","generate",{input:get("input").value}, (success, result, error)=>{
        if(success){
            output(result);
        }else{
            output(error);
        }
    });
}
function output(text) {
    get("out").innerText=text;
}