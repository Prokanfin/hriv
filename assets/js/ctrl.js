hrApp.controller('loginAppCtrl2', function ($scope, $http, service_list, $location) {



    $scope.btnLogin = function (txtUsername, txtPassword) {



        service_list.service_api_login(txtUsername, txtPassword, function (detail) {
            $scope.em_detail = detail;
            var loginStatus = $scope.em_detail = detail;
            //console.log($scope.em_detail);

            if (loginStatus) {
                console.log("OK");
                $location.path('dashboard');
            }

        });

        //$location.path('profile');


    }


});


hrApp.controller('profileCtrl', function ($scope, service_list) {


    service_list.service_api_profile(function (detail) {
        $scope.em_profile = detail;


    });


});

