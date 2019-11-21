<?php
return [
    //应用ID,您的APPID。
    'app_id' => "2016101400681549",

    //商户私钥
    'merchant_private_key' => "MIIEowIBAAKCAQEA5OR70PWOyleztMyuRDf8JvjXez7Gm8IYmNfAb8fN3134zd8m5htCTq7u/y/BcKsdMfoI4DfWlJy0DUsKx8TKESc3SWtRHwP4Pke9dfDUbFsJcdqXCOiX/EA2P2kR/oxbV8Wmr+6bh4xxVdSstbvskbTtuq0ke+iFaaREBx60WWkHX8gSwOND5z+ADprWY2w7nyuOv9xbtEtborkmaUu1U+WtdX4ijskZVFbGpbBnu9uYLrdAoug8oWXLhPfj1aDp1q3HVowj49pBNauqIyseg/iGqBDUaVoAeGXs1EBYzYpg6c0laF2V2oczWA4kCyG+x7bdcqVAo4/M3B06UCb7TQIDAQABAoIBAQC+6vV7rdaUX+K9A5y3uhrQRu81FX+Dm7n4gr04f2fwz+kfjupbNJFyH+epYqPu3ktTzEJrAygwfSSRke5EApipBhTPYHwhaqY9DImzPlVwq96M4M7p11guR0D4UyN3NotaArquNE/2F+bQuLv2OfFw94DzHEg6MhBVtXYomivEBosThHxDsVT6nH4dB8S5JIKnqPXuSykSEa753E+D7Bq51vpwoKScBR4Fh+6MXTWRc680q7TpioLibUsRADlyr6BxrOmj5xKgonnXUpZyOaQIFqe6WYGX5zDKAhvSnwKE7P252n76lq5RaUVonFn6PBBMcnUCkCuxFHTscbX1L13hAoGBAPPYNfnvhqUBk3WmShLah2sED+k6fl+3gOyWfcOjplEzhmtqB5WCfmEKUCMaA4qPwwgsOg2Ahbg2+vTBON+eV5caCsn8W7WMyk++YkzZCploQ88x8ug4HFau2cXNQpIXp2B6AclXQIEtgb8t44g0izIy2byVCeu9ubxlCIYPIrm3AoGBAPBNdtLByZqbjxOd5pQ/1K/hE32MjiroLAadlOvbNYa3bInBThBhGueYaa2HWWHhYmdIiRGdpe8X9JxAfXDZ/jDTINHjiI5fziSFzWcCCyKtzssWplCq4wgU6fm/RQLS4xoH5ve2C+rdPbHS3TscDsz7WxRnV5pHDsvJgsQIMcMbAoGAK7Mm0Tj092NV6vK3ObPCKxKaS2D5PuwjBcNenI4ag1jpkRx6aXfucDOp8vB5i/6BpFhQuxS6Yi4wQWbTa3f0GJdJMbOxN9MYerwS39TRynZeGKbJ8oYDxiEl1AYaFRZ6H5cd9NhXLg9avklaCpHoFEH6tYo8MexZegLdSTEzNvcCgYAN1ZfaqFdv9Da3fWax8D7RZVbW6omgxL8MHnRdY8BgIh04jQ1uefivjqG+4MTvkqc0pQNnJTlRW4K0oC3YmmQ88Vq5Wq0Y7UET7zQVExQLChCWtpYanMv3QiT6QN27POLgM8ZDSpLDEbukiiw8Y/AiMvJaaVyswByE9PP3TzV2MwKBgCxkMqBn9OuYUHFKJ+Eq+fBhLyPY662KmI2urcU0XFexQLBM5BLlJRFr0mF+vIBNgRLCbe3f//FnJihJRkisw89M1rUO1a5LRrEgFkRHBTu7L2wU+aomWKI6PScShZmVs9IYkI1pP6qybU0JjYkr53OGADn82s7qvaG/u1JJlwnL",

    //异步通知地址
    'notify_url' => "http://1905shop.com/index.php/order/notify_url",

    //同步跳转
    'return_url' => "http://1905shop.com/index.php/order/return_url",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsr7lpdgm4qmoi3Vwg+3ckcHBlCXCVHWJ0zc7CtbfYnxo1JLALY/aWnJ1lB5LH8s9UOXl7IdF+m73JlDYEdjhqhMupE1IcPvRqV05wI3Qhn3UAMPIgyZ50ypXfkUjIcmBG7T/0ACWE6Q6QvSPpMxefZp9OrWXCa+TxGtfYDghsD7UaQW5eaeolz7pQGRkNzudyh0nYl0DO88TssGPOyp6R/L2nmIV4A/++gnXP0vsYKq4wDEG5W0+pTLBP2+6m5ShJni1Nr1SA6hsLhiACzQwWtNoVUDupgBgnc7FvxL0N8ZIhiI3ibFPiyqmi4L3w6/vrSJqhhuMPM6M7HVHl9WgqwIDAQAB",
];