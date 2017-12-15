/**
 * Created by димон on 15.12.2017.
 */
Validation.add('validate-email', function(v) {
    return Validation.get('IsEmpty').test(v) || /^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@*)$/i.test(v)
})