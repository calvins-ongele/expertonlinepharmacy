<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'public/includes/header.inc.php' ?>
    <style>
    :root {
      --primary-color: hsl(var(--base));
      --primary-hover: hsl(var(--green));
      --bg-color: #f3f4f6;
      --card-bg: #ffffff;
      --text-color: #1f2937;
      --gray-light: #e5e7eb;
      --gray-text: #6b7280;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }

    .body {
      background-color: var(--bg-color);
      color: var(--text-color);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .form-container {
      background: var(--card-bg);
      width: 100%;
      max-width: 600px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      overflow: hidden;
    }

    /* Progress Bar */
    .progressbar {
      display: flex;
      justify-content: space-between;
      background: #fafafa;
      padding: 20px 30px;
      border-bottom: 1px solid var(--gray-light);
    }

    .step-indicator {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--gray-text);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .step-indicator.active {
      color: var(--primary-color);
    }

    .step-number {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: var(--gray-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
    }

    .step-indicator.active .step-number {
      background: var(--primary-color);
      color: #fff;
    }

    /* Form Content */
    .form-step {
      display: none;
      padding: 30px;
    }

    .form-step.active {
      display: block;
    }

    h2 {
      margin-bottom: 10px;
      font-size: 1.5rem;
    }

    p.description {
      color: var(--gray-text);
      font-size: 0.95rem;
      margin-bottom: 20px;
      line-height: 1.5;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-size: 0.875rem;
      font-weight: 600;
      margin-bottom: 6px;
    }

    input, select, textarea, input[type='file'] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid var(--gray-light);
      border-radius: 6px;
      font-size: 0.95rem;
      outline: none;
      transition: border-color 0.2s;
    }

    input:focus, select:focus, textarea:focus {
      border-color: var(--primary-color);
    }

    .row1 {
      display: flex;
      gap: 15px;
    }

    .row1 .form-group {
      flex: 1;
    }

    /* Info Box in Step 1 */
    .info-box {
      background: #eff6ff;
      border-left: 4px solid var(--primary-color);
      padding: 15px;
      border-radius: 4px;
      margin-bottom: 20px;
      font-size: 0.9rem;
      color: #1e40af;
    }

    .info-box ul {
      margin-left: 20px;
      margin-top: 8px;
    }

    /* Buttons */
    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 25px;
    }

    .btn {
      padding: 10px 20px;
      border-radius: 6px;
      border: none;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.2s;
    }

    .btn-primary {
      background: var(--primary-color);
      color: #fff;
    }

    .btn-primary:hover {
      background: var(--primary-hover);
    }

    .btn-secondary {
      background: var(--gray-light);
      color: var(--text-color);
    }

    .btn-secondary:hover {
      background: #d1d5db;
    }

    .btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }
  </style>
</head>

<body>

    <?php require "public/includes/navbar.inc.php" ?>
    <!-- ==================== Header End Here ==================== -->
    <main>
        
     <!-- ==================== Breadcrumb Start Here ==================== -->
        <section class="breadcrumb py-120 bg-img" data-background-image="<?= $this->_company['breadcrumb_bg'] ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="breadcrumb__wrapper">
                            <h2 class="breadcrumb__title"> About Us</h2>
                            <ul class="breadcrumb__list">
                                <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                            class="las la-home"></i> Home</a> </li>
                                <li class="breadcrumb__item"><i class="fa-solid fa-angle-right"></i></li>
                                <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> About us </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     <!-- ==================== Breadcrumb Start Here ==================== -->
      <section class="body">

      <div class="form-container">
        <!-- Step Progress Header -->
        <div class="progressbar">
            <div class="step-indicator active" id="ind-1">
            <span class="step-number">1</span> Info
            </div>
            <div class="step-indicator" id="ind-2">
            <span class="step-number">2</span> Event Details
            </div>
            <div class="step-indicator" id="ind-3">
            <span class="step-number">3</span> Tickets
            </div>
            <div class="step-indicator" id="ind-4">
            <span class="step-number">4</span> Payout
            </div>
        </div>

        <form id="multiStepForm">
            
            <!-- STEP 1: Overview & Guidelines -->
            <div class="form-step active" id="step-1">
            <h2>Announce Your Event</h2>
            <p class="description">Get your event listed in front of thousands of attendees in just a few quick steps!</p>
            
            <div class="info-box">
                <strong>How it works:</strong>
                <ul>
                <li>Submit your event details & venue info.</li>
                <li>Set up ticket pricing or mark as free entry.</li>
                <li>Provide payment details so we can transfer ticket revenues directly to you.</li>
                </ul>
            </div>

            <p class="description">
                Please ensure you have authorization to host this event and that your payment information is accurate to prevent payout delays.
            </p>

            <div class="btn-group" style="justify-content: flex-end;">
                <?php if (Session::get('userid') == null) { ?>
                <a href="/login?return=<?= urlencode("/services/register?event=1") ?>" class="btn btn-primary" onclick="nextStep(2)">Login to get started &rarr;</a>
                <?php } else { ?>
                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Get Started &rarr;</button>
                <?php } ?>
            </div>
            </div>

            <!-- STEP 2: Event Details -->
            <div class="form-step" id="step-2">
            <h2>Event Details</h2>
            <p class="description">Tell potential attendees what your event is all about.</p>

            <div class="form-group">
                <label for="eventTitle">Event Title *</label>
                <input type="text" id="eventTitle" name="title" placeholder="e.g., Summer Book Launch or Beach Party '26" required>
            </div>

            <div class="form-group">
                <label for="eventType">Event Type *</label>
                <select id="eventType"  name="purpose" required>
                <option value="" hidden>Select type...</option>
                <option value="party">Party / Nightlife</option>
                <option value="book_launch">Book Launch</option>
                <option value="concert">Concert / Live Music</option>
                <option value="workshop">Workshop / Seminar</option>
                <option value="other">Other</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="eventDate">Date *</label>
                    <input type="date" name="date" id="eventDate" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="eventTime">Time *</label>
                    <input type="time" name="time" id="eventTime" required>
                    </div>
                </div>
            </div>

            <div class="row1">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="eventLocation">Location / Venue *</label>
                    <input type="text" id="eventLocation" name="loc" placeholder="e.g., Grand Hotel Ballroom or Online Link" required>
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                    <label class='dpic'>Provide a posta/cover photo:</label>
                    <input type='file' name='pic' class="border-bottom form-control" accept='image/*'> 
                </div>
                </div>
            </div>
            

            <div class="form-group">
                <label for="eventDescription">Description</label>
                <textarea id="eventDescription" name="details" rows="3" placeholder="Briefly describe what attendees can expect..."></textarea>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary" onclick="nextStep(1)">&larr; Back</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next: Tickets &rarr;</button>
            </div>
            </div>

            <!-- STEP 3: Tickets & Pricing -->
            <div class="form-step" id="step-3">
            <h2>Tickets & Capacity</h2>
            <p class="description">Set your ticket prices and available capacity.</p>

            <div class="form-group">
                <label for="ticketType">Pricing Model *</label>
                <select id="ticketType" name="pricing_model" onchange="togglePriceInput(this.value)" required>
                <option value="paid">Paid Event</option>
                <option value="free">Free Entry</option>
                </select>
            </div>

            <div class="row" id="priceRow">
                <div class="form-group" style="display: none;">
                <label for="ticketPrice">Ticket Price (KES) *</label>
                <input type="number" id="ticketPrice" name="target" min="0" xstep="0.01" placeholder="25.00" value="0">
                </div>
            </div>
            <div class="form-group">
            <label for="totalTickets">Total Capacity / Seats</label>
            <input type="number" id="totalTickets" name="capacity" placeholder="100">
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary" onclick="nextStep(2)">&larr; Back</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(4)">Next: Payment Settings &rarr;</button>
            </div>
            </div>

            <!-- STEP 4: Payout Details -->
            <div class="form-step" id="step-4">
            <h2>Payout Info</h2>
            <p class="description">Where should we send ticket revenue from your bookings?</p>

            <div class="form-group">
                <label for="payoutMethod">Preferred Payout Method *</label>
                <select id="payoutMethod" name="payout_method" required>
                <option value="mizizi_classifieds" selected>Mizizi Classifieds Account</option>
                <!-- <option value="bank">Bank Transfer (ACH/Wire)</option>
                <option value="paypal">PayPal</option>
                <option value="stripe">Stripe Direct Connect</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for="payoutMethod">Select Account *</label>
                <select id="payoutMethod" class="accountselect" name="payout_account" required>
                <option value="mizizi_classifieds" selected>Mizizi Classifieds Account</option>
                <!-- <option value="bank">Bank Transfer (ACH/Wire)</option>
                <option value="paypal">PayPal</option>
                <option value="stripe">Stripe Direct Connect</option> -->
                </select>
            </div>

            <!-- <div class="form-group">
                <label for="accountHolder">Account Holder / Legal Name *</label>
                <input type="text" id="accountHolder" placeholder="John Doe or Acme LLC" required>
            </div>

            <div class="form-group">
                <label for="accountDetails">Account Number / Email Address *</label>
                <input type="text" id="accountDetails" placeholder="IBAN, Account #, or PayPal Email" required>
            </div> -->

            <div class="my-2 " id="step-4-error"></div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary" onclick="nextStep(3)">&larr; Back</button>
                <button type="submit" class="btn btn-primary">Submit Event</button>
            </div>
            </div>

        </form>
        </div>



      </section>
        
    </main>
    <!-- ==================== Footer Start Here ==================== -->
    <?php require "public/includes/footer.inc.php" ?>
    <?php if (Session::get('userid') !== null) { ?>
    <script>
    let currentStep = 1;

    function nextStep(step) {
        // Hide current step
        document.getElementById(`step-${currentStep}`).classList.remove('active');
        document.getElementById(`ind-${currentStep}`).classList.remove('active');

        // Show new step
        currentStep = step;
        document.getElementById(`step-${currentStep}`).classList.add('active');
        document.getElementById(`ind-${currentStep}`).classList.add('active');
    }

    function togglePriceInput(value) {
        const priceRow = document.getElementById('priceRow');
        if (value === 'free') {
        priceRow.style.display = 'none';
        } else {
        priceRow.style.display = 'flex';
        }
    }

    // Handle Form Submission
    const formElement = document.getElementById('multiStepForm');
    formElement.addEventListener('submit', async function(e) {
        e.preventDefault();
        const form = new FormData(formElement);
        form.append('datef', displayFormattedDate( form.get('date') )); 
        const response = await fetch("/myapp/register-service", {method:"POST", body: form });
        const result = await response.json();
             
        if (!result.error) {    
            const feed = document.querySelector("#step-4");
            feed.classList.add("alert", "alert-success");
            feed.innerHTML = result.msg;
            return;
        }
        const f = document.querySelector("#step-4-error");
        f.classList.add("alert", "alert-danger");
        f.innerHTML = result.msg;
    });

    
        list_accounts_cards()
        async function list_accounts_cards() {
            const response = await fetch("/myapp/list_accounts_cards", {method:"POST"});
            const data = await response.json();
            document.querySelector('.accountselect').innerHTML = data.output; 
        }

    </script>
    <?php } ?>
</body>

</html>