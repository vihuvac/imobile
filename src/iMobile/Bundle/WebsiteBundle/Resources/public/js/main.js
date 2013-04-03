var template = function (string) {
    'use strict';

    return function (replace) {
        var i, pattern;
        for (i in replace) {
            pattern = new RegExp('__' + i + '__', 'gi');
            string = string.replace(pattern, replace[i]);
        }
        string = string.replace(/__\w+__/gi, '');
        return string;
    };
};