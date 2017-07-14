<?php
return [

//	// 安全检验码，以数字和字母组成的32位字符。
	'key' => 'oUAEhRzroKHkFn1+dcm60g==',
//
//	//签名方式
//	'sign_type' => 'MD5',

    // 签名方式
    'sign_type' => 'RSA',

    // 商户私钥。
    'private_key_path' => 'MIICXAIBAAKBgQDgv5C8TXFNup0NX66gzdiCarNKo2nEzC1SQhGtGGkLIWtKQfjh0kL4X2/5vD9jlX3rPTBTVMxHLI9T1He3vpjBwJ9+EJ0bErYQlz+cjZeQdAQXCVF0bosxarJ0tOd2wzUrvUPKsz3Y825D8oCctxJafT58iQTejSkSt0W6i7IF9wIDAQABAoGBAKsjNCMvFUgLAexdH6xzEpq8hSogpTmmABzTEoKsQ9Cl8fzpn4rVgQmAItQX9GzwOKIYReQufh70X2+GKmNQTyBNJO/R3hAtUkE+YvWQAUUtldDoqf4E5zgwn7ykVjLPgAX126nFYG5cRzGKtUFZ4Dd7MqKGBIMguzC5E0MoJnIBAkEA8399KJZHJttbaRtTtBuo2gx6Hsj4Wh2NFpr6k+f5lbDc5nr+tnJlJm4sApV4B38Ja9HbwozQFu0anaa5fFxH0QJBAOxJoehdp8mIjjCqIgL67yiPyuMsHPUhPhoFriUrXSNoIJlhypY6POhiww8nvJ2sq/OUCXY+Ohmoy+ujIJnqK0cCQEk7KGsSdyeqhR1hSJU8VFXvtrKXgomnpY0M4xukgp2QaX8vsncwhFdAfx/vz/+BJ1Yz8UHbk6GxgXW0dMiAAGECQEgvEmQ/QEPkELQzNWK9sBQvIWcXEd2dAzDF7XZzceegJt1Ur6QHNJY1natik0+D8Z/e6KkTx4IRPALHee0rSX8CQBrSxkUQ/4qpx4MBwa/kaP2nj1hfzX80P4og5u6SfkInoS5ACxjN+WlEn9qRTANu6GbsbcPEv+nhgGP5gzNj93E=',

    // 阿里公钥。
    'public_key_path' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDElKLOzH5ljHL5lE1z/Ray2TZGD4FfUsZyiR5nR9jJ+q2Eap4yW8K4K+KY4W8DjJ8W5BCtvsXcYKAkgY4YLxteeZTKnN/F1CrTLZpXt+XLHLumAATS3qCmfWiBbjuFyNDYwecgyKNYiOeBeZrEN0OCUi8a5KZogbNSoeO0jSvnfwIDAQAB',

	// 服务器异步通知页面路径。
	'notify_url' => 'http://www.mylaravel.com/notify',

	// 页面跳转同步通知页面路径。
	'return_url' => 'http://www.mylaravel.com/return'
];
