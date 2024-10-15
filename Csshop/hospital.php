<?php include 'header.php'; ?>
    <main>
    <article style="padding: 100px 160px 100px;">
    <h2>จำแนกรายชื่อโรงพยาบาลเอกชน</h2>
     <div>
        <h2>โรงพยาบาลขนาดใหญ่ ต้องมีจำนวนเตียงที่จัดให้บริการผู้ป่วยตั้งแต่ 91 เตียงขึ้นไป</h2>
        <ul id="large-hospitals"></ul>
        
        <h2>โรงพยาบาลขนาดกลาง ต้องมีจำนวนเตียงที่จัดให้บริการผู้ป่วยตั้งแต่ 31 เตียงขึ้นไปแต่ไม่เกิน 90 เตียง</h2>
        <ul id="medium-hospitals"></ul>
        
        <h2>โรงพยาบาลขนาดเล็ก ต้องมีจำนวนเตียงที่จัดให้บริการผู้ป่วยไม่เกิน 30 เตียง</h2>
        <ul id="small-hospitals"></ul>
    </div>

    <script>

         async function getDataFromAPI() {
            try {
                let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json');
                let rawData = await response.text(); 
                let objectData = JSON.parse(rawData);

                let largeHospitals = document.getElementById('large-hospitals');
                let mediumHospitals = document.getElementById('medium-hospitals');
                let smallHospitals = document.getElementById('small-hospitals');

                for (let i = 0; i < objectData.features.length; i++) {
                    let hospital = objectData.features[i];
                    let hospitalName = hospital.properties.name;
                    let numBeds = hospital.properties.num_bed;

                    let content = `${hospitalName} - ${numBeds} เตียง`;

                    let li = document.createElement('li');
                    li.innerHTML = content;

                    if (numBeds >= 91) {
                        largeHospitals.appendChild(li);
                    } else if (numBeds >= 31 && numBeds <= 90) {
                        mediumHospitals.appendChild(li);
                    } else {
                        smallHospitals.appendChild(li);
                    }
                }
            } catch (error) {
                console.error('Error fetching or processing data:', error);
            }
        }

        getDataFromAPI();
    </script>
      </article>
      
<?php include 'footer.php'; ?>