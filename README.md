# driving_school
## 📖 Extended Description (Optional Details)

<details>
<summary><b>Click to read full project story - Client, Challenges, Learnings</b></summary>

### 👩‍👩‍👧‍👦 Client Story
Shamase Driving School is a 100% family-owned business run by sisters **Thando & Zama Mkhwanazi** in Adams Mission (D995 Sheleni Road, 4100). 
Their late father taught them to drive. Now they teach the community with patience, in Zulu & English.

Motto: *"We Don't Teach You To Pass Test. We Teach You To Pass Life On The Road!"*

**Contact for verification:** 062 653 8701 / Thandomkhwanazi04@gmail.com

### 🚧 Problem I Solved
1. They had no website - losing learners to Durban schools
2. Enquiries via calls only - no tracking
3. Old enquiry form was leaking data in URL (`?fullName=`) and crashing for guests

### ✅ My Solution
- Built mobile-first site (90% of Adams users are on phone)
- Fixed guest checkout bug: `user_id NULL` handling for non-logged users
- Compressed 8 car images from 32MB PNG → 1.2MB JPG (25x faster)
- Added AJAX so form stays on #contact section (UX fix)
- WhatsApp direct integration

### 🧠 What I Learned (For Internship)
- Real client > tutorial: Had to explain hosting, domain, WhatsApp Business
- Linux servers are case-sensitive: `Car1.PNG` != `car1.jpg`
- Security: Never expose `$stmt->error` to user, use `error_log()`
- Performance: `loading="lazy"` + JPG 75% is key for SA data costs

### 🔮 Future Improvements (Optional)
- [ ] Admin panel to approve reviews
- [ ] SMS notification via BulkSMS SA
- [ ] Booking calendar for Code 8/10/14
- [ ] PWA for offline K53 signs

</details>
