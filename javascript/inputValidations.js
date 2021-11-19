function validationVaccineLot(){
    var form = $('#addVaccineLotForm')
    form.validate({
        rules: {
            selectedVaccine: {
                required: true
            },
            qty:{
                required: true,
                number: true
            },
            source: {
                required: true
            },
            dateStored: {
                required: true,
                date: true
            },
            dateExp: {
                required: true,
                date: true
            }
        }
    });
    return form.valid();
};

function validationNewVaccineBrand(){
    var form = $('#newVaccineBrandForm')
    form.validate({
        rules: {
            vaccineName: {
                required: true
            },
            vaccineManufacturer:{
                required: true
            },
            vaccineDescription: {
                required: true
            },
            vaccineType: {
                required: true
            },
            vaccineEfficacy: {
                required: true
            },
            dosageRequired: {
                required: true,
                number: true
            },
            dosageInterval: {
                required: true,
                number: true
            },
            minimumTemperature: {
                required: true,
                number: true
            },
            maximumTemperature: {
                required: true,
                number: true
            },
            lifeSpan: {
                required: true,
                number: true
            }
        }
    });
    return form.valid();
}

function validationPatient(){
    var form = $('#registrationForm')
    form.validate({
            rules: {
                lname: "required",
                fname: "required",
                suffix: "required",
                birthdate: "required",
                gender: "required",
                occupation: "required",
                contactNum: "required",
                email: "required",
                priorityGroup: "required",
                categoryNo: "required",
                houseAddress: "required",
                barangay: "required",
                allergy: "required",
                comorbidity: "required",
                otherCom: "required"
            },
            messages: {
                lname: "First name is required",
                fname: "Last name is required",
                suffix: "Suffix is required",
                birthdate: "Birthdate is required",
                gender: "Gender is required",
                occupation: "Occupation is required",
                contactNum: "Contact number is required",
                email: "Email is required",
                priorityGroup: "Category group is required",
                categoryNo: "Category ID is required",
                houseAddress: "Address is required",
                barangay: "Barangay is required",
                allergy: "Allergy is required",
                comorbidity: "Comorbidity is required",
                otherCom: "Other comorbidity is required"
            }
        });
    return form.valid();
}


function validationSite(){
    var form = $('#addVaccinationSiteForm')
    form.validate({
        rules: {
            vaccinationLoc: "required"
        }
    });
    return form.valid();
}

function validationFile(){
    var form = $('#uploadForm')
    form.validate({
        rules: {
            fileUpload: {
                required: true,
                extension: "csv"
            }
        }
    });
    return form.valid();
}







