const helper = {
    clone: function(obj) {

        if (typeof obj !== 'object' ||
            obj === null) {

            return obj;
        }

        var newObj;
        var cloneDeep = false;

        if (!Array.isArray(obj)) {
            if (Buffer.isBuffer(obj)) {
                newObj = new Buffer(obj);
            }
            else if (obj instanceof Date) {
                newObj = new Date(obj.getTime());
            }
            else if (obj instanceof RegExp) {
                newObj = new RegExp(obj);
            }
            else {

                var proto = Object.getPrototypeOf(obj);
                if (proto &&
                    proto.isImmutable) {

                    newObj = obj;
                }
                else {
                    newObj = Object.create(proto);
                    cloneDeep = true;
                }
            }
        }
        else {
            newObj = [];
            cloneDeep = true;
        }
     
        if (cloneDeep) {
            var keys = Object.getOwnPropertyNames(obj);
            for (var i = 0; i < keys.length; ++i) {
                var key = keys[i];
                var descriptor = Object.getOwnPropertyDescriptor(obj, key);
                if (descriptor &&
                    (descriptor.get ||
                     descriptor.set)) {
                    
                    Object.defineProperty(newObj, key, descriptor);
                }
                else {
                    if (!newObj[key]) {
                        newObj[key] = {};
                    }
                    var childObj = this.clone(obj[key]);
                    if (typeof(childObj) == 'string' || !isNaN(childObj)) {
                        newObj[key] = childObj;
                    }else {
                        Object.keys(childObj).forEach(function(key2){
                            newObj[key][key2] = childObj[key2];
                        });
                    }
                }
            }
        }
        return newObj;
    }, 
}

module.exports = helper;