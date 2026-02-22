<?php
$pageTitle = 'Dental Services | Implants, Root Canal, Braces and Smile Makeover';
$metaDescription = 'Explore dental services at Arma Dental Clinic including smile makeovers, implants, root canal treatment, aligners, pediatric dentistry, and preventive care.';
$pagePath = 'services.php';
require_once __DIR__ . '/includes/header.php';
?>

<main>
  <section class="page-hero section">
    <div class="container">
      <p class="eyebrow">Dental Treatments</p>
      <h1>Comprehensive Dental Services for Every Age Group</h1>
      <p>From routine checkups to advanced restorative care, we provide complete treatment under one roof.</p>
    </div>
  </section>

  <section class="services section">
    <div class="container">
      <div class="service-grid">
        <?php
        $services = [
          ["title" => "Smile Makeover (Cosmetic Dentistry)", "focus" => "Veneers, Teeth Whitening, Smile Designing", "desc" => "Transform your smile with personalized cosmetic treatments and natural-looking results.", "image" => "assets/images/smile_desing.jpg"],
          ["title" => "Missing Tooth Solutions", "focus" => "Dental Implants and Bridges", "desc" => "Replace missing teeth with durable, natural-looking implants or fixed bridges.", "image" => "assets/images/implants.jpg"],
          ["title" => "Tooth Pain Relief", "focus" => "Root Canal Treatment", "desc" => "Save your natural tooth and eliminate pain with modern root canal procedures.", "image" => "assets/images/rct.jpg"],
          ["title" => "Tooth Repair", "focus" => "Crowns and Bridges", "desc" => "Restore weak or broken teeth with custom-designed crowns and bridgework.", "image" => "https://images.pexels.com/photos/4687360/pexels-photo-4687360.jpeg?auto=compress&cs=tinysrgb&w=1200"],
          ["title" => "Braces and Tooth Alignment", "focus" => "Metal Braces, Ceramic Braces, Clear Aligners", "desc" => "Correct misalignment with orthodontic options for children, teens, and adults.", "image" => "assets/images/braces.jpg"],
          ["title" => "Gum Health and Bleeding Issues", "focus" => "Periodontic Gum Care", "desc" => "Treat gum bleeding, swelling, and infection with targeted periodontal care.", "image" => "assets/images/gum.jpg"],
          ["title" => "Children's Dental Care", "focus" => "Preventive and Pediatric Treatments", "desc" => "Gentle and child-friendly care that supports healthy habits from a young age.", "image" => "assets/images/children.jpg"],
          ["title" => "Tooth Removal and Oral Surgeries", "focus" => "Extractions and Minor Surgeries", "desc" => "Safe and sterile oral procedures for wisdom teeth and other surgical needs.", "image" => "assets/images/extraction.jpg"],
          ["title" => "Dentures", "focus" => "Full and Partial Denture Sets", "desc" => "Comfortable, custom-fitted dentures designed for function and natural appearance.", "image" => "assets/images/dentures.jpg"],
          ["title" => "Teeth Cleaning and Polishing", "focus" => "Scaling and Oral Hygiene Counseling", "desc" => "Remove plaque and tartar buildup with professional cleaning and preventive guidance.", "image" => "https://images.pexels.com/photos/4269688/pexels-photo-4269688.jpeg?auto=compress&cs=tinysrgb&w=1200"],
          ["title" => "Emergency Dental Care", "focus" => "Pain, Injury, Swelling", "desc" => "Same-day support for urgent dental issues including trauma and severe pain.", "image" => "https://images.pexels.com/photos/7089401/pexels-photo-7089401.jpeg?auto=compress&cs=tinysrgb&w=1200"],
          ["title" => "Preventive Dental Checkups", "focus" => "X-Rays and Full Mouth Exams", "desc" => "Routine exams and diagnostics to detect and prevent problems early.", "image" => "assets/images/preventive.jpg"]
        ];
        foreach ($services as $service):
        ?>
          <article class="service-card">
            <img src="<?php echo esc($service["image"]); ?>" alt="<?php echo esc($service["title"]); ?>" style="width:100%;height:180px;object-fit:cover;border-radius:12px;margin-bottom:12px;" loading="lazy">
            <h3><?php echo esc($service["title"]); ?></h3>
            <p><strong><?php echo esc($service["focus"]); ?></strong><br><?php echo esc($service["desc"]); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="process section">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">Treatment Workflow</p>
        <h2>Structured Planning for Better Outcomes</h2>
      </div>
      <div class="process-grid">
        <article>
          <span>01</span>
          <h3>Assessment</h3>
          <p>Detailed oral and radiographic diagnosis of your concern.</p>
        </article>
        <article>
          <span>02</span>
          <h3>Personalized Plan</h3>
          <p>Multiple treatment options with transparent duration and costs.</p>
        </article>
        <article>
          <span>03</span>
          <h3>Execution and Follow-Up</h3>
          <p>Safe procedure delivery and periodic reviews for stability.</p>
        </article>
      </div>
      <div class="section-cta">
        <a class="btn btn-primary" href="contact.php">Book Service Consultation</a>
      </div>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
