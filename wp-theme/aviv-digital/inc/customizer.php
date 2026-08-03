<?php
/**
 * חיווט כל טקסטי עמוד הבית לפאנל העריכה של וורדפרס.
 *
 * נבחר ה-Customizer ולא תוסף חיצוני משתי סיבות: הוא מובנה בוורדפרס
 * (בלי תלות בתוסף שעלול להישבר או להיות בתשלום), והוא מציג תצוגה
 * מקדימה חיה — הלקוח רואה את השינוי תוך כדי הקלדה.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ברירות המחדל — הטקסטים המאושרים. הן גם מה שמוצג כל עוד לא נערך דבר,
 * כך שהאתר אף פעם לא מוצג ריק.
 */
function avivdigital_defaults() {
	return array(
		// הירו
		'hero_eyebrow'  => 'סטודיו בוטיק לבניית דפי נחיתה ואתרים',
		'hero_title'    => 'בונים לך נוכחות דיגיטלית<br>שאפשר <strong>לסמוך</strong> עליה.',
		'hero_sub'      => 'מדף נחיתה ועד אתר מלא — תהליך מסודר, מהשאלון הראשון ועד שהתוצאה מדויקת בשבילך.',
		'hero_btn1'     => 'בואו נתחיל — למילוי השאלון',
		'hero_btn2'     => 'לשיחה בוואטסאפ',

		// הצהרה
		'stmt_eyebrow'  => 'איך אנחנו עובדים',
		'stmt_title'    => 'לא עוד סטודיו שמעלה עמוד ונעלם.<br><strong>כל פרויקט מתחיל בשאלון מפורט, וממשיך עד שהתוצאה מדויקת בשבילך.</strong>',
		'stmt_text'     => 'זו לא סיסמה — זה תהליך שאפשר לבדוק בעצמכם. השאלון שאנחנו שולחים לכל לקוח חדש הוא הצעד הראשון בכל פרויקט, לא תוספת.',

		// שירותים
		'srv_eyebrow'   => 'מה אנחנו בונים',
		'srv_title'     => 'משירות ממוקד ועד אתר שלם',
		'srv_sub'       => 'שני היקפים, אותו תהליך קפדני מאחוריהם.',
		'srv1_title'    => 'דף נחיתה',
		'srv1_sub'      => 'עמוד אחד, פעולה אחת ברורה. מתאים לבעל מקצוע עצמאי שרוצה נוכחות שבונה אמון מהר.',
		'srv1_list'     => "עיצוב מותאם אישית לפי המיתוג שלך\nניסוח תוכן מקצועי, לא תבנית גנרית\nמותאם מלא למובייל\nכפתור יצירת קשר ישיר — וואטסאפ או טופס",
		'srv2_title'    => 'אתר עסקי מלא',
		'srv2_sub'      => 'כמה עמודים — בית, שירותים, אודות, צור קשר — לעסק עם היצע רחב יותר.',
		'srv2_list'     => "ארכיטקטורת ניווט מותאמת לעסק שלך\nזהות ויזואלית עקבית בכל עמוד\nמהירות טעינה ונגישות כחלק מהבנייה, לא תוספת\nמבנה מוכן לגדילה — עמודים חדשים בהמשך",

		// תיק עבודות
		'work_eyebrow'  => 'תיק עבודות',
		'work_title'    => 'העבודות שלנו',
		'work_sub'      => 'הפרויקט הראשון שלנו כבר באוויר. השאר בדרך — כל עבודה שתופיע כאן תהיה אמיתית, לא הדמיה.',
		'work1_caption' => 'עמית פרחן — דף נחיתה לדולה ומדריכת הנקה',
		'work1_url'     => 'https://amitfarhandoula.com',
		'work_soon'     => 'בקרוב',

		// ההבטחה
		'prom_eyebrow'  => 'ההבטחה שלנו',
		'prom_title'    => 'לא רק מבטיחים — מוכיחים',
		'prom1_title'   => 'מקצועיות',
		'prom1_text'    => 'תהליך מובנה ומתועד — השאלון שממלאים בהתחלה הוא הוכחה חיה, לא סיסמה.',
		'prom2_title'   => 'אחריות',
		'prom2_text'    => 'מלווים אתכם עד שביעות רצון מלאה. לא נעלמים אחרי המסירה.',
		'prom3_title'   => 'אמון',
		'prom3_text'    => 'כנות מוחלטת על מה שיש ומה שאין. תחילת דרך אומרת תשומת לב מלאה לכל לקוח.',

		// התהליך
		'proc_eyebrow'  => 'איך זה עובד',
		'proc_title'    => 'שישה שלבים, בלי הפתעות',
		'proc_sub'      => 'מהפנייה הראשונה ועד ההשקה — כדי שתדעו בדיוק למה לצפות.',
		'proc1_title'   => 'שאלון אפיון',
		'proc1_text'    => 'מכירים את העסק שלך לעומק, בלי ניחושים.',
		'proc2_title'   => 'טיוטת עיצוב',
		'proc2_text'    => 'כיוון ויזואלי לאישור לפני שנכתבת שורת קוד אחת.',
		'proc3_title'   => 'פיתוח',
		'proc3_text'    => 'בונים לפי הטיוטה שאושרה.',
		'proc4_title'   => 'תיקונים עד שביעות רצון',
		'proc4_text'    => 'לא עוצרים בסבב אחד אם עוד לא מדויק.',
		'proc5_title'   => 'בדיקות איכות',
		'proc5_text'    => 'עובר בדיקה לפני שהוא עובר אליך.',
		'proc6_title'   => 'השקה',
		'proc6_text'    => 'עולה לאוויר, ואתה יודע בדיוק מה קיבלת.',

		// צור קשר
		'cta_eyebrow'   => 'מוכנים להתחיל?',
		'cta_title'     => 'בואו נתחיל',
		'cta_lead'      => 'הצעד הראשון הוא שאלון אפיון קצר — כ־10 דקות, ואפשר לעצור ולחזור. הוא בדיוק מה שיעזור לנו להבין את העסק שלכם לעומק.',
		'cta_btn1'      => 'למילוי השאלון ✦',
		'cta_btn2'      => 'שיחה ישירה בוואטסאפ',

		// פרטי קשר
		'wa_number'     => '972528225337',
		'wa_label'      => '+972-52-822-5337',
		'quest_url'     => 'https://avivdigi.com/questionnaire/',
		'foot_tagline'  => 'סטודיו בוטיק לבניית דפי נחיתה ואתרים',
	);
}

/**
 * שליפת טקסט — מהפאנל אם נערך, אחרת ברירת המחדל.
 */
function avivdigital_text( $key ) {
	$defaults = avivdigital_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

	return get_theme_mod( 'avivdigital_' . $key, $default );
}

/**
 * הדפסת טקסט שמותר בו עיצוב בסיסי בלבד (הדגשה ושבירת שורה).
 */
function avivdigital_rich( $key ) {
	echo wp_kses(
		avivdigital_text( $key ),
		array(
			'strong' => array(),
			'em'     => array(),
			'br'     => array(),
		)
	);
}

/**
 * המרת שדה רב-שורתי לרשימת פריטים.
 */
function avivdigital_lines( $key ) {
	$raw   = avivdigital_text( $key );
	$lines = preg_split( '/\r\n|\r|\n/', (string) $raw );

	return array_values( array_filter( array_map( 'trim', $lines ), 'strlen' ) );
}

/**
 * רישום כל השדות בפאנל.
 */
function avivdigital_customize_register( $wp_customize ) {
	$defaults = avivdigital_defaults();

	$wp_customize->add_panel(
		'avivdigital_content',
		array(
			'title'       => 'תוכן עמוד הבית',
			'description' => 'כל הטקסטים של עמוד הבית. השינויים מוצגים מיד בתצוגה המקדימה שמימין.',
			'priority'    => 20,
		)
	);

	$sections = array(
		'hero' => array(
			'title'  => '1. פתיח (הירו)',
			'fields' => array(
				'hero_eyebrow' => array( 'שורה קטנה מעל הכותרת', 'text' ),
				'hero_title'   => array( 'כותרת ראשית — אפשר <strong>הדגשה</strong> ו-<br> לשבירת שורה', 'textarea' ),
				'hero_sub'     => array( 'משפט מתחת לכותרת', 'textarea' ),
				'hero_btn1'    => array( 'כפתור ראשי', 'text' ),
				'hero_btn2'    => array( 'כפתור וואטסאפ', 'text' ),
			),
		),
		'stmt' => array(
			'title'  => '2. הצהרה',
			'fields' => array(
				'stmt_eyebrow' => array( 'שורה קטנה', 'text' ),
				'stmt_title'   => array( 'ההצהרה — אפשר <strong>הדגשה</strong> ו-<br>', 'textarea' ),
				'stmt_text'    => array( 'פסקת הסבר', 'textarea' ),
			),
		),
		'srv'  => array(
			'title'  => '3. שירותים',
			'fields' => array(
				'srv_eyebrow' => array( 'שורה קטנה', 'text' ),
				'srv_title'   => array( 'כותרת האזור', 'text' ),
				'srv_sub'     => array( 'משפט מתחת לכותרת', 'textarea' ),
				'srv1_title'  => array( 'כרטיס 1 — שם השירות', 'text' ),
				'srv1_sub'    => array( 'כרטיס 1 — תיאור', 'textarea' ),
				'srv1_list'   => array( 'כרטיס 1 — רשימה (שורה לכל פריט)', 'textarea' ),
				'srv2_title'  => array( 'כרטיס 2 — שם השירות', 'text' ),
				'srv2_sub'    => array( 'כרטיס 2 — תיאור', 'textarea' ),
				'srv2_list'   => array( 'כרטיס 2 — רשימה (שורה לכל פריט)', 'textarea' ),
			),
		),
		'work' => array(
			'title'  => '4. תיק עבודות',
			'fields' => array(
				'work_eyebrow'  => array( 'שורה קטנה', 'text' ),
				'work_title'    => array( 'כותרת האזור', 'text' ),
				'work_sub'      => array( 'משפט מתחת לכותרת', 'textarea' ),
				'work1_caption' => array( 'כיתוב מתחת לעבודה הראשונה', 'text' ),
				'work1_url'     => array( 'קישור לעבודה הראשונה', 'url' ),
				'work_soon'     => array( 'טקסט במשבצות הריקות', 'text' ),
			),
		),
		'prom' => array(
			'title'  => '5. ההבטחה שלנו',
			'fields' => array(
				'prom_eyebrow' => array( 'שורה קטנה', 'text' ),
				'prom_title'   => array( 'כותרת האזור', 'text' ),
				'prom1_title'  => array( 'ערך 1 — כותרת', 'text' ),
				'prom1_text'   => array( 'ערך 1 — תיאור', 'textarea' ),
				'prom2_title'  => array( 'ערך 2 — כותרת', 'text' ),
				'prom2_text'   => array( 'ערך 2 — תיאור', 'textarea' ),
				'prom3_title'  => array( 'ערך 3 — כותרת', 'text' ),
				'prom3_text'   => array( 'ערך 3 — תיאור', 'textarea' ),
			),
		),
		'proc' => array(
			'title'  => '6. התהליך',
			'fields' => array(
				'proc_eyebrow' => array( 'שורה קטנה', 'text' ),
				'proc_title'   => array( 'כותרת האזור', 'text' ),
				'proc_sub'     => array( 'משפט מתחת לכותרת', 'textarea' ),
				'proc1_title'  => array( 'שלב 1 — כותרת', 'text' ),
				'proc1_text'   => array( 'שלב 1 — תיאור', 'textarea' ),
				'proc2_title'  => array( 'שלב 2 — כותרת', 'text' ),
				'proc2_text'   => array( 'שלב 2 — תיאור', 'textarea' ),
				'proc3_title'  => array( 'שלב 3 — כותרת', 'text' ),
				'proc3_text'   => array( 'שלב 3 — תיאור', 'textarea' ),
				'proc4_title'  => array( 'שלב 4 — כותרת', 'text' ),
				'proc4_text'   => array( 'שלב 4 — תיאור', 'textarea' ),
				'proc5_title'  => array( 'שלב 5 — כותרת', 'text' ),
				'proc5_text'   => array( 'שלב 5 — תיאור', 'textarea' ),
				'proc6_title'  => array( 'שלב 6 — כותרת', 'text' ),
				'proc6_text'   => array( 'שלב 6 — תיאור', 'textarea' ),
			),
		),
		'cta'  => array(
			'title'  => '7. צור קשר',
			'fields' => array(
				'cta_eyebrow' => array( 'שורה קטנה', 'text' ),
				'cta_title'   => array( 'כותרת', 'text' ),
				'cta_lead'    => array( 'פסקת הסבר', 'textarea' ),
				'cta_btn1'    => array( 'כפתור ראשי', 'text' ),
				'cta_btn2'    => array( 'כפתור וואטסאפ', 'text' ),
			),
		),
		'meta' => array(
			'title'  => '8. פרטי קשר וקישורים',
			'fields' => array(
				'wa_number'    => array( 'מספר וואטסאפ בפורמט בינלאומי (למשל 9725...)', 'text' ),
				'wa_label'     => array( 'המספר כפי שמוצג באתר', 'text' ),
				'quest_url'    => array( 'קישור לשאלון האפיון', 'url' ),
				'foot_tagline' => array( 'שורת התיאור בפוטר', 'text' ),
			),
		),
	);

	foreach ( $sections as $slug => $section ) {
		$wp_customize->add_section(
			'avivdigital_' . $slug,
			array(
				'title' => $section['title'],
				'panel' => 'avivdigital_content',
			)
		);

		foreach ( $section['fields'] as $key => $field ) {
			list( $label, $type ) = $field;

			$sanitize = 'wp_kses_post';
			if ( 'url' === $type ) {
				$sanitize = 'esc_url_raw';
			} elseif ( 'textarea' === $type && in_array( $key, array( 'srv1_list', 'srv2_list' ), true ) ) {
				$sanitize = 'sanitize_textarea_field';
			}

			$wp_customize->add_setting(
				'avivdigital_' . $key,
				array(
					'default'           => isset( $defaults[ $key ] ) ? $defaults[ $key ] : '',
					'sanitize_callback' => $sanitize,
					'transport'         => 'refresh',
				)
			);

			$wp_customize->add_control(
				'avivdigital_' . $key,
				array(
					'label'   => $label,
					'section' => 'avivdigital_' . $slug,
					'type'    => 'url' === $type ? 'url' : $type,
				)
			);
		}
	}
}
add_action( 'customize_register', 'avivdigital_customize_register' );
