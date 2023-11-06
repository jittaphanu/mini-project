let apiDataFetched = false;
async function APIprovince(parentValue = null, status = null) {
    let response = await fetch('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province_with_amphure_tambon.json');
    let rawData = await response.text();
    let objectData = JSON.parse(rawData);
    let result = document.getElementById('province');
    let result2 = document.getElementById('amphure');
    let result3 = document.getElementById('tambon');
    let result4 = document.getElementById('zipcode');

    if (!apiDataFetched) {
        console.log("province");
        result.innerHTML = '';
        for (let i = 0; i < objectData.length; i++) {
            let province = objectData[i];
            let content = province.name_th;
            let option = document.createElement('option');
            option.value = content;
            option.text = content;
            result.appendChild(option);
        }
        apiDataFetched = true;
    }

    if (status === "amphure") {
        result2.innerHTML = '';
        for (let i = 0; i < objectData.length; i++) {
            let province = objectData[i];
            if (parentValue === province.name_th) {
                console.log("amphure");
                for (let j = 0; j < province.amphure.length; j++) {
                    let amphure = province.amphure[j];
                    let content2 = amphure.name_th;
                    let option2 = document.createElement('option');
                    option2.value = content2;
                    option2.text = content2;
                    result2.appendChild(option2);
                }
            }
        }
    }

    if (status === "tambon") {
        result3.innerHTML = '';
        for (let i = 0; i < objectData.length; i++) {
            let province = objectData[i];
            for (let j = 0; j < province.amphure.length; j++) {
                let amphure = province.amphure[j];
                if (parentValue === amphure.name_th) {
                    console.log("tambon");
                    for (let k = 0; k < amphure.tambon.length; k++) {
                        let tambon = amphure.tambon[k];
                        let content3 = tambon.name_th;
                        let option3 = document.createElement('option');
                        option3.value = content3;
                        option3.text = content3;
                        result3.appendChild(option3);
                    }
                }
            }
        }
    }
    if (status === "zipcode") {
        result4.innerHTML = '';
        for (let i = 0; i < objectData.length; i++) {
            let province = objectData[i];
            for (let j = 0; j < province.amphure.length; j++) {
                let amphure = province.amphure[j];
                if (parentValue === amphure.name_th) {
                    console.log("zipcode");
                    for (let k = 0; k < amphure.tambon.length; k++) {
                        let tambon = amphure.tambon[k];
                        let content4 = tambon.zip_code;
                        let option4 = document.createElement('option');
                        option4.value = content4;
                        option4.text = content4;
                        result4.appendChild(option4);
                    }
                }
            }
        }
    }
}

function updateAddress() {
    var provinceValue = document.getElementById('province').value || '';
    var amphureValue = document.getElementById('amphure').value || '';
    var tambonValue = document.getElementById('tambon').value || '';
    var zipcodeValue = document.getElementById('zipcode').value || '';

    // Concatenate the selected values into one string
    var txtAddress = 'จังหวัด : ' + provinceValue + ', อำเภอ : ' + amphureValue + ', ตำบล : ' + tambonValue + ', รหัสไปรษณีย์ : ' + zipcodeValue;

    // Set the txtAddress string as the value of the input field
    document.getElementById('txtAddress').value = txtAddress;
}


window.onload = function(){
    

    let provinceDropdown = document.getElementById("province");
    let amphureDropdown = document.getElementById("amphure");       
    amphureDropdown.disabled = true;
    let tambonDropdown = document.getElementById("tambon");         
    tambonDropdown.disabled = true;
    let zipcodeDropdown = document.getElementById("zipcode");         
    zipcodeDropdown.disabled = true;

    provinceDropdown.addEventListener("click", function () {
        if (!apiDataFetched) {
            APIprovince();        
            amphureDropdown.disabled = false;
        }
    });
    provinceDropdown.addEventListener("blur", function () {
        // console.log(provinceDropdown.value);
        APIprovince(provinceDropdown.value,"amphure");        
        APIprovince(amphureDropdown.value,"tambon");
        APIprovince(amphureDropdown.value,"zipcode");
        tambonDropdown.disabled = false;
    });
    amphureDropdown.addEventListener("blur",function () {
        // console.log(amphureDropdown.value);
        APIprovince(amphureDropdown.value,"tambon");
        APIprovince(amphureDropdown.value,"zipcode");
    });
    tambonDropdown.addEventListener("blur",function () {
        zipcodeDropdown.disabled = false;
        APIprovince(amphureDropdown.value,"zipcode");
    });
    zipcodeDropdown.addEventListener("blur",function () {
        updateAddress();
    });

    
}