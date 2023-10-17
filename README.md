# Cloudflare Toplu DNS Kayıtlarını Silme

Bu PHP betiği, Cloudflare API'sini kullanarak belirli bir alan adına ait DNS kayıtlarını silmek için tasarlanmıştır. Aşağıda, bu kodun nasıl kullanılacağı ve özelleştirileceği açıklanmıştır.

## Kullanım

1. Bu kodu bilgisayarınıza indirin veya GitHub'dan klonlayın.

2. Kod içindeki aşağıdaki değişkenleri kendi Cloudflare hesap bilgilerinizle doldurun:

    ```php
    $apiKey = "Cloudflare_API_Anahtarınız";
    $email = "Cloudflare_Hesap_Eposta_Adresiniz";
    $domain = "DNS_Kayıtlarını_Silmek_Istediğiniz_Alan_Adı";
    ```

3. Kodu çalıştırın.

    ```
    php cloudflare.php
    ```

## Dikkat

Bu kodu dikkatle kullanmalısınız. Yanlışlıkla DNS kayıtlarını silmek, web sitenizin çalışmamasına neden olabilir. Lütfen API anahtarlarınızı ve hesap bilgilerinizi güvende tutun.

## Katkıda Bulunma

Herhangi bir hata veya öneriniz varsa lütfen bir "issue" açın veya bir "pull request" gönderin.

## Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Daha fazla bilgi için [LICENSE](LICENSE) dosyasına bakın.

---

Bu README dosyası, bu PHP betiğinin temel kullanımını açıklar ve projenin kullanımını ve katkıda bulunmayı kolaylaştırmak için oluşturulmuştur.
