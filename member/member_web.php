<? $smid=$_SESSION['smid'];
$jojo=queryx1("select * from system_account where sa_sm_id='$smid' limit 1");
?>
<div class="container_8 clearfix">
    <!-- Main Section -->
    <section class="main-content">
        <header>
            <h2>
                สร้างเว็บไซต์
            </h2>
        </header>
        <section class="main-section clearfix">
		<h3>โปรดตั้งชื่อเว็บไซต์ส่วนตัวของคุณ และคุณสามารถใช้เว็บไซต์ประชาสัมพันธ์ด้วยชื่อที่คุณตั้งขึ้นได้</h3>
        <hr>
        <div class="regist-error"></div>
        <p>
        <form action="#" method="post" name="formupdateacc" id="formupdateacc">
        <input type="hidden" name="sa_id" value="<?=$jojo['sa_id'];?>" />
            <p><label>ชื่อเว็บไซต์ส่วนตัว สำหรับทำธุรกิจ http://<?=$www;?>/?</label>
                <input type="text" size="40" name="sa_www" id="sa_www" required="required" value="<?=$jojo['sa_www'];?>"/>
            </p>
            <p><label>แสดงผลบน Title bar </label>
                <input type="text" size="83" name="sa_title" id="sa_title" value="<?=$jojo['sa_title'];?>"/>
            </p>
            <p><label>คำอธิบายเว็บไซต์ เช่น เป็นเว็บไซต์ส่วนตัวของ... </label><br><br>
                <textarea name="sa_description" id="sa_description" cols="100" rows="2"><?=$jojo['sa_description'];?></textarea>
            </p>
            <p><label>คำที่ต้องการให้ Search Enging ต่าง ๆ เข้ามาเก็บข้อมูล คั่นด้วย , เพื่อคั่นระหว่างคำ </label><br><br>
                <textarea name="sa_search" id="sa_search" cols="100" rows="2"><?=$jojo['sa_search'];?></textarea>
            </p>
            <div class="clear"></div>
            <hr />
            <p align="center">
                <input type="submit" name="btneditc" value="บันทึก" class="button button-orange" />
                <input type="reset" name="btnreset" value="คืนค่า" class="button button-blue" />
            </p>
        </form>
        </p>
        
        <div class="message info">
            <p>เนื่องจากกฎหมาย พรบ.คอมพิวเตอร์ ปี 2550 ได้มี ข้อกำหนดในการใช้งานเว็บไซต์ขอสมาชิก และบทลงโทษอย่างจริงจัง
            และทีมงานได้พัฒนาระบบให้ถูกต้องตามกฎหมาย โดยการแนะนำเว็บไซต์ไปยังคนที่สมาชิกรู้จักผ่านระบบต่างๆ ที่ทีมงานเตรียมไว้ให้
            แต่พบว่า มีสมาชิกบางท่าน ใช้เว็บไซต์ไปในแนวทางผิดต่อกฎหมาย ทางทีมงานจึงต้องมีข้อกำหนดในการใช้งานเว็บไซต์ของสมาชิกดังนี้</p>
                <p><ol>
                <li>ห้ามสมาชิก Spam Email แนะนำเว็บไซต์ หรือใช้โปรแกรมใดๆ ยิงโฆษณา</li>
                <li>ห้ามมิให้สมาชิก โพสโฆษณาที่ขัดต่อกฎหมาย พรบ.คอมพิวเตอร์ 2550</li>
                <li>สมาชิกจะไม่นำเว็บไซต์ไปใช้ในทางที่ ทำให้เกิดความเสียหายต่อภาพรวมของระบบ และบริษัทฯ</li>
                <li>อ้างอิงตาม พรบ. คอมพิวเตอร์ 2550 ทุกประการ (พรบ.คอมฉบับเข้าใจง่าย , ฉบับการ์ตูนของ ICT)</li>
                </ol></p>
            
            <p>และหากเกิดปัญหาจากการกระทำผิดของสมาชิก ทางทีมงานจะไม่รับผิดชอบใดๆ ทั้งสิ้น</p>
            <div class="clear"></div>
        </div
        ></section>

	</section>
</div>