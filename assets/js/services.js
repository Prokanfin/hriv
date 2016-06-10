hrApp.factory('service_list', function ($http, $rootScope) {

    return {
        service_login: function (txtUsername,txtPassword,callback) {
            $http.get('http://tae-pc:8080/hr2/public/auth/login/' + txtUsername + '/' + txtPassword).success(callback);
        },
        service_login_post: function (txtUsername, txtPassword,callback){
            var data='username='+txtUsername+'&password='+txtPassword;
            $http.post('http://tae-pc:8080/hr2/public/api/login',data,{headers:{'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
        },
        
        service_api_login:function (txtUsername, txtPassword, callback){
            var data='username='+txtUsername+'&password='+txtPassword;
            var formData = new FormData();
            formData.append('username', txtUsername);
            formData.append('password', txtPassword);
             $http.post('api/login',data,{headers:{'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);
        },
        
        service_api_profile:function (callback){
            $http.get('api/sel_profile',{},{headers:{'Content-Type': 'application/x-www-form-urlencoded'}}).success(callback);

        }
        
        
        
    }
});