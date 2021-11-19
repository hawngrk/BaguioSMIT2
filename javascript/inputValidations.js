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

function validationDeployment(){
    var form = $('#newDeploymentForm')
    form.validate({
        rules: {
            site: {
                required: true
            },

            date: {
              required: true,
              date: true
            },

            districts:{
                required: true,
                minlength: 1
            }
        }
    });
    return form.valid();
}

function validationHealthDistrict(){
    var form = $('#healthDistrictForm')
    form.validate({
        rules: {
            newHealthDistrict: {
                required: true
            },

            contactNumber: {
                required: true,
                number: true
            },

            barangay: {
                required: true,
                minlength: 1
            }
        }
    });
    return form.valid();
}






