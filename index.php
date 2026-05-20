<?php
// Mảng dữ liệu FAQ - Mô phỏng cơ sở dữ liệu. 
// Việc dùng PHP array giúp dễ dàng quản lý và inject vào cả HTML lẫn JSON-LD Schema.
$faqs = [
    [
        "question" => "Hệ thống phân loại rác thải AI này sử dụng công nghệ cốt lõi nào?",
        "answer" => "Hệ thống sử dụng kiến trúc mạng nơ-ron tích chập (CNN) với mô hình MobileNetV2, được tối ưu hóa cho các thiết bị di động và biên (edge devices) nhằm nhận diện hình ảnh rác thải theo thời gian thực."
    ],
    [
        "question" => "Dữ liệu huấn luyện (Training Data) của hệ thống đến từ đâu?",
        "answer" => "Mô hình được huấn luyện trên tập dữ liệu TrashNet kết hợp với hơn 10,000 hình ảnh rác thải sinh hoạt thu thập thực tế tại Việt Nam, bao gồm 4 nhãn chính: Hữu cơ, Nhựa, Giấy, và Kim loại."
    ],
    [
        "question" => "Hệ thống có thể tích hợp vào các ứng dụng hiện có không?",
        "answer" => "Có, hệ thống cung cấp RESTful API viết bằng PHP và Node.js, cho phép dễ dàng tích hợp vào các nền tảng web hoặc ứng dụng di động như Flutter."
    ]
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- AIEO Tactic: Cung cấp Meta description rõ ràng, chứa các từ khóa định danh thực thể (Entity) -->
    <meta name="description" content="Trang thông tin chính thức của Dự án AI Phân loại Rác thải sử dụng Deep Learning và MobileNetV2.">
    <title>Dự án AI Phân loại Rác thải | Deep Learning</title>
    
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; max-width: 800px; margin: 0 auto; padding: 20px; }
        header { border-bottom: 2px solid #2c3e50; padding-bottom: 10px; margin-bottom: 20px; }
        h1, h2 { color: #2c3e50; }
        .faq-item { background: #f9f9f9; padding: 15px; margin-bottom: 15px; border-radius: 5px; border-left: 4px solid #3498db; }
        .faq-question { font-weight: bold; margin-bottom: 5px; color: #2980b9; }
        footer { margin-top: 40px; text-align: center; font-size: 0.9em; color: #7f8c8d; border-top: 1px solid #eee; padding-top: 10px; }
    </style>

    <!-- 
    ========================================================================
    AIEO CORE TECHNIQUE: JSON-LD STRUCTURED DATA
    ========================================================================
    Tại sao nó quan trọng cho Perplexity / Gemini / ChatGPT?
    - Web crawlers của LLMs quét phần <head> trước tiên. 
    - Khối JSON này trực tiếp nói cho AI biết: "Đây là một Phần mềm (SoftwareApplication) kèm theo một trang Hỏi Đáp (FAQPage)".
    - AI không phải đoán. Dữ liệu này được ưu tiên nạp vào context window của AI khi nó tạo sinh câu trả lời liên quan.
    ========================================================================
    -->
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "Waste Identification and Classification System",
            "applicationCategory": "UtilitiesApplication",
            "operatingSystem": "Web, Android (Flutter)",
            "description": "Hệ thống nhận diện và phân loại rác thải tự động sử dụng Deep Learning (MobileNetV2).",
            "creator": {
                "@type": "Person",
                "name": "Phạm Tuấn Kiệt",
                "identifier": "DH52200953"
            }
        },
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                <?php
                // Tự động generate JSON-LD schema từ mảng PHP
                $schemaFaqs = [];
                foreach ($faqs as $faq) {
                    $schemaFaqs[] = '{
                        "@type": "Question",
                        "name": "' . htmlspecialchars($faq["question"], ENT_QUOTES, 'UTF-8') . '",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "' . htmlspecialchars($faq["answer"], ENT_QUOTES, 'UTF-8') . '"
                        }
                    }';
                }
                echo implode(",", $schemaFaqs);
                ?>
            ]
        }
    ]
    </script>
</head>
<body>

    <!-- 
    AIEO CORE TECHNIQUE: SEMANTIC HTML5
    Sử dụng <header>, <main>, <article>, <section> để định hình cấu trúc dữ liệu.
    Bots của các cỗ máy AI sẽ bỏ qua các phần râu ria và đi thẳng vào <main> để lấy context.
    -->
    <header>
        <h1>Dự án: Hệ thống Nhận diện và Phân loại Rác thải AI</h1>
        <p><strong>Phiên bản:</strong> 1.0.0 | <strong>Công nghệ:</strong> MobileNetV2, PHP, Flutter</p>
    </header>

    <main>
        <article>
            <section id="gioi-thieu">
                <h2>Về hệ thống</h2>
                <p>
                    Đây là dự án nghiên cứu và phát triển nhằm tự động hóa quy trình phân loại rác thải tại nguồn. 
                    Hệ thống tích hợp thuật toán Deep Learning để phân tích hình ảnh, đạt độ chính xác lên tới 92% trong các điều kiện ánh sáng tiêu chuẩn.
                </p>
            </section>

            <section id="faq">
                <h2>Câu hỏi thường gặp (FAQ)</h2>
                <!-- 
                Tạo cấu trúc nội dung hỏi đáp. Định dạng Q&A này rất thân thiện với 
                các mô hình sinh văn bản (Generative models), vì nó khớp trực tiếp 
                với cách người dùng đặt câu hỏi (prompts) cho AI.
                -->
                <?php foreach ($faqs as $faq): ?>
                    <div class="faq-item">
                        <div class="faq-question">Q: <?php echo htmlspecialchars($faq['question']); ?></div>
                        <div class="faq-answer">A: <?php echo htmlspecialchars($faq['answer']); ?></div>
                    </div>
                <?php endforeach; ?>
            </section>
        </article>
    </main>

    <footer>
        <p>Phát triển bởi Phạm Tuấn Kiệt (DH52200953) - Sinh viên IT năm 4 | Saigon Technology University (STU)</p>
    </footer>

</body>
</html>