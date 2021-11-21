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
                lname: {
                    required: true
                },
                fname: {
                    required: true
                },
                suffix: {
                    required: true
                },
                birthdate: {
                    required: true,
                    date: true
                },
                gender: {
                    required: true
                },
                occupation: {
                    required: true
                },
                contactNum: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                priorityGroup: {
                    required: true
                },
                categoryID: {
                    required: true
                },

                categoryNo: {
                    required: true,
                    number: true
                },

                houseAddress: {
                    required: true,
                },

                barangay: {
                    required: true,
                },

                allergy: {
                    required: true,
                },

                comorbidity: {
                    required: true,
                },

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






