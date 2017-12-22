Validation.add('validate-email', 'Please enter a valid Gmail address. For example johndoe@gmail.com.', function(v) {
    return Validation.get('IsEmpty').test(v) || /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@gmail\.com)$/i.test(v)
})